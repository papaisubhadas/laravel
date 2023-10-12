<?php

namespace Modules\Page\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Artisan;

class PagesController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        // $this->module_title = 'Pages';

        // module name
        $this->module_name = 'pages';

        // directory path of the module
        $this->module_path = 'page::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-edit';

        // module model name, path
        $this->module_model = "Modules\Page\Models\Page";
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.list');
        $module_title = __('page.pages_title');

        $$module_name = $module_model::paginate();

        logUserAccess($module_title.' '.$module_action);

        return view(
            "$module_path.$module_name.index_datatable",
            compact('module_title', 'module_name', "$module_name", 'module_icon', 'module_name_singular', 'module_action')
        );
    }

    /**
     * Select Options for Select 2 Request/ Response.
     *
     * @return Response
     */
    public function index_list(Request $request)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.list');
        $module_title = __('page.pages_title');

        $term = trim($request->q);

        if (empty($term)) {
            return response()->json([]);
        }

        $query_data = $module_model::where('name', 'LIKE', "%$term%")->orWhere('slug', 'LIKE', "%$term%")->limit(7)->get();

        $$module_name = [];

        foreach ($query_data as $row) {
            $$module_name[] = [
                'id' => $row->id,
                'text' => $row->name.' (Slug: '.$row->slug.')',
            ];
        }

        return response()->json($$module_name);
    }

    public function index_data()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.list');
        $module_title = __('page.pages_title');

        $page_heading = label_case($module_title);
        $title = $page_heading.' '.label_case($module_action);

        //$$module_name = $module_model::select('*');
        $$module_name = $module_model::leftjoin('page_translations', 'pages.id', '=', 'page_translations.page_id')
            ->select('pages.*' ,'page_translations.page_title AS page_title')
            ->where('page_translations.locale','=',App::currentLocale())
            ->orderBy('pages.id','DESC');

        $data = $$module_name;

        return Datatables::of($$module_name)
            ->addColumn('action', function ($data) {
                $module_name = $this->module_name;

                return view('backend.includes.action_column', compact('module_name', 'data'));
            })
            ->editColumn('slug', '{{$slug}}')
            ->editColumn('status', function ($data) {
                if($data->status == 'active')
                {
                    $is_featured = '<span class="badge bg-success">Active</span>';
                }else{
                    $is_featured = '<span class="badge bg-danger">In Active</span>';
                }

                return $is_featured;
            })
            ->editColumn('updated_at', function ($data) {
                $module_name = $this->module_name;

                $diff = Carbon::now()->diffInHours($data->updated_at);

                if ($diff < 25) {
                    return $data->updated_at->diffForHumans();
                } else {
                    return $data->updated_at->isoFormat('llll');
                }
            })
            ->filterColumn('page_title', function($query, $keyword) {
                $sql = "page_translations.page_title  like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->rawColumns(['page_title','slug','status', 'action'])
            ->orderColumns(['pages.id'], '-:column $1')
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.create');
        $module_title = __('page.pages_title');

        logUserAccess($module_title.' '.$module_action);

        return view(
            "$module_path.$module_name.create",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_name_singular', 'module_action')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        Artisan::call("optimize:clear");
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.store');
        $module_title = __('page.pages_title');

        $validator = Validator::make($request->all(),[

            'page_title_en' => 'required|max:255|regex:/^[a-zA-Z0-9\s]+$/',
            'page_name_en' => 'required|max:255|regex:/^[a-zA-Z0-9\s]+$/',
            'page_body_en' => 'required',
            'page_title_ar' => 'required|max:255',
            'page_name_ar' => 'required|max:255',
            'page_body_ar' => 'required',
            'page_title_fr' => 'required|max:255',
            'page_name_fr' => 'required|max:255',
            'page_body_fr' => 'required',
            'page_title_ru' => 'required|max:255',
            'page_name_ru' => 'required|max:255',
            'page_body_ru' => 'required',
            'slug' => 'required|max:255|regex:/^[a-z][-a-z0-9]*$/|unique:pages,slug',
            'type' =>'required|in:page,section',
            'status' =>'required|in:active,inactive',
        ],
        [
            'page_title_en.required' => 'Page Title in En is required',
            'page_title_en.regex' => 'Page Title in En does not allow special characters',
            'page_name_en.regex' => 'Page Name in En does not allow special characters',
            'page_name_en.required' => 'Page Name En is required',
            'page_body_en.required' => 'Page Body in En is required',
            'page_title_ar.required' => 'Page Title in Ar is required',
            'page_name_ar.required' => 'Page Name in Ar is required',
            'page_body_ar.required' => 'Page Body in Ar is required',
            'page_title_fr.required' => 'Page Title in Fr is required',
            'page_name_fr.required' => 'Page Name in Fr is required',
            'page_body_fr.required' => 'Page Body in Fr is required',
            'page_title_ru.required' => 'Page Title in Ru is required',
            'page_name_ru.required' => 'Page Name in Ru is required',
            'page_body_ru.required' => 'Page Body in Ru is required',
            'slug.regex' => 'Slug should be in URL valid format',
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'message' => '',
                'errors' => $validator->errors()
            ]);
        }

        $$module_name_singular = $module_model::create([
            'en' => [
                'page_title'      => $request->page_title_en,
                'page_name'       => $request->page_name_en,
                'page_body'       => $request->page_body_en,
            ],
            'ar' => [
                'page_title'      => $request->page_title_ar,
                'page_name'       => $request->page_name_ar,
                'page_body'       => $request->page_body_ar,
            ],
            'fr' => [
                'page_title'      => $request->page_title_fr,
                'page_name'       => $request->page_name_fr,
                'page_body'       => $request->page_body_fr,
            ],
            'ru' => [
                'page_title'      => $request->page_title_ru,
                'page_name'       => $request->page_name_ru,
                'page_body'       => $request->page_body_ru,
            ],
            'slug' => $request->slug,
            'type' => $request->type,
            'status' => $request->status,
        ]);


        //$$module_name_singular = $module_model::create($request->all());

        Cache::forget('pages-en');
        Cache::forget('pages-ar');
        Cache::forget('pages-fr');
        Cache::forget('pages-ru');

        flash("<i class='fas fa-check'></i> ".Str::singular($module_title).__('common.add_data'))->success()->important();

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

        return response()->json([
            'status' => 1,
            'message' => "<i class='fas fa-check'></i> New '" . Str::singular($module_title) . "' Added",
            'data' => [
                'redirect' => url("admin/$module_name")
            ]
        ]);

        //return redirect("admin/$module_name");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.show');
        $module_title = __('page.pages_title');

        $$module_name_singular = $module_model::findOrFail($id);

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

        return view(
            "$module_path.$module_name.show",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_name_singular', 'module_action', "$module_name_singular")
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.edit');
        $module_title = __('page.pages_title');

        $$module_name_singular = $module_model::findOrFail($id);

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

        return view(
            "$module_path.$module_name.edit",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', "$module_name_singular")
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        Artisan::call("optimize:clear");
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.update');
        $module_title = __('page.pages_title');

        $$module_name_singular = $module_model::findOrFail($id);

        $validator = Validator::make($request->all(),[

            'page_title_en' => 'required|max:255|regex:/^[a-zA-Z0-9\s]+$/',
            'page_name_en' => 'required|max:255|regex:/^[a-zA-Z0-9\s]+$/',
            'page_body_en' => 'required',
            'page_title_ar' => 'required|max:255',
            'page_name_ar' => 'required|max:255',
            'page_body_ar' => 'required',
            'page_title_fr' => 'required|max:255',
            'page_name_fr' => 'required|max:255',
            'page_body_fr' => 'required',
            'page_title_ru' => 'required|max:255',
            'page_name_ru' => 'required|max:255',
            'page_body_ru' => 'required',
            'slug' => 'required|max:255|regex:/^[a-z][-a-z0-9]*$/|',
            'type' =>'required|in:page,section',
            'status' =>'required|in:active,inactive',
        ],
        [
            'page_title_en.required' => 'Page Title in En is required',
            'page_title_en.regex' => 'Page Title in En does not allow special characters',
            'page_name_en.regex' => 'Page Name in En does not allow special characters',
            'page_title_ar.required' => 'Page Title in Ar is required',
            'page_name_ar.required' => 'Page Name in Ar is required',
            'page_body_ar.required' => 'Page Body in Ar is required',
            'page_title_fr.required' => 'Page Title in Fr is required',
            'page_name_fr.required' => 'Page Name in Fr is required',
            'page_body_fr.required' => 'Page Body in Fr is required',
            'page_title_ru.required' => 'Page Title in Ru is required',
            'page_name_ru.required' => 'Page Name in Ru is required',
            'page_body_ru.required' => 'Page Body in Ru is required',
            'slug.regex' => 'Slug should be in URL valid format',
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'message' => '',
                'errors' => $validator->errors()
            ]);
        }

        $$module_name_singular->update([
            'en' => [
                'page_title'      => $request->page_title_en,
                'page_name'       => $request->page_name_en,
                'page_body'       => $request->page_body_en,
            ],
            'ar' => [
                'page_title'      => $request->page_title_ar,
                'page_name'       => $request->page_name_ar,
                'page_body'       => $request->page_body_ar,
            ],
            'fr' => [
                'page_title'      => $request->page_title_fr,
                'page_name'       => $request->page_name_fr,
                'page_body'       => $request->page_body_fr,
            ],
            'ru' => [
                'page_title'      => $request->page_title_ru,
                'page_name'       => $request->page_name_ru,
                'page_body'       => $request->page_body_ru,
            ],
            'slug' => $request->slug,
            'type' => $request->type,
            'status' => $request->status,
        ]);
        $$module_name_singular->update($request->all());
        Cache::forget('pages-en');
        Cache::forget('pages-ar');
        Cache::forget('pages-fr');
        Cache::forget('pages-ru');

        flash("<i class='fas fa-check'></i> ".Str::singular($module_title).__('common.updated_data'))->success()->important();

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

        return response()->json([
            'status' => 1,
            'message' => "<i class='fas fa-check'></i> New '" . Str::singular($module_title) . "' Added",
            'data' => [
                'redirect' => route("backend.$module_name.show", $$module_name_singular->id)
            ]
        ]);

       // return redirect()->route("backend.$module_name.show", $$module_name_singular->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Artisan::call("optimize:clear");
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.destroy');
        $module_title = __('page.pages_title');

        $$module_name_singular = $module_model::findOrFail($id);

        $$module_name_singular->delete();

        Cache::forget('pages-en');
        Cache::forget('pages-ar');
        Cache::forget('pages-fr');
        Cache::forget('pages-ru');

        flash("<i class='fas fa-check'></i> ".Str::singular($module_title).__('common.deleted_data'))->success()->important();

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

        return redirect("admin/$module_name");
    }

    /**
     * List of trashed ertries
     * works if the softdelete is enabled.
     *
     * @return Response
     */
    public function trashed()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.trashlist');
        $module_title = __('page.pages_title');

        $$module_name = $module_model::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate();

        logUserAccess($module_title.' '.$module_action);

        return view(
            "$module_path.$module_name.trash",
            compact('module_title', 'module_name', 'module_path', "$module_name", 'module_icon', 'module_name_singular', 'module_action')
        );
    }

    /**
     * Restore a soft deleted entry.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.restore');
        $module_title = __('page.pages_title');

        $$module_name_singular = $module_model::withTrashed()->find($id);
        $$module_name_singular->restore();

        flash("<i class='fas fa-check'></i> ".Str::singular($module_title).__('common.restored_data'))->success()->important();


        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

        return redirect("admin/$module_name");
    }

}
