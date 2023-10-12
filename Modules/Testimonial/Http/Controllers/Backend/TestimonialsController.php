<?php

namespace Modules\Testimonial\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Artisan;

class TestimonialsController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        // $this->module_title = __('testimonial.testimonial');

        // module name
        $this->module_name = 'testimonials';

        // directory path of the module
        $this->module_path = 'testimonial::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-comments';

        // module model name, path
        $this->module_model = "Modules\Testimonial\Models\Testimonial";
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
        $module_title = __('testimonial.testimonial_title');

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
        $module_title = __('testimonial.testimonial_title');

        $term = trim($request->q);

        if (empty($term)) {
            return response()->json([]);
        }

//        $query_data = $module_model::leftjoin('car_type_translations', 'car_types.id', '=', 'car_type_translations.car_type_id')
//            ->select('car_types.id AS id','car_type_translations.title AS title','car_types.slug AS slug')
//            ->where('car_type_translations.title', 'LIKE', "%$term%")
//            ->orWhere('car_types.slug', 'LIKE', "%$term%")->limit(7)->get();


        $query_data = $module_model::where('name', 'LIKE', "%$term%")->orWhere('slug', 'LIKE', "%$term%")->limit(7)->get();

        $$module_name = [];

        foreach ($query_data as $row) {
            $$module_name[] = [
                'id' => $row->id,
                'text' => $row->title.' (Slug: '.$row->slug.')',
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
        $module_title = __('testimonial.testimonial_title');

        $page_heading = label_case($module_title);
        $title = $page_heading.' '.label_case($module_action);

        //$$module_name = $module_model::select('*');
        $$module_name = $module_model::leftjoin('testimonial_translations', 'testimonials.id', '=', 'testimonial_translations.testimonial_id')
            ->select('testimonials.*' ,'testimonial_translations.name AS name')
            ->where('testimonial_translations.locale','=',App::currentLocale())
            ->orderBy('testimonials.id','DESC');

        $data = $$module_name;
//        echo "<pre>";
//        print_r($$module_name);
//        echo "</pre>";
//
//        die();

        return Datatables::of($$module_name)
            ->addColumn('action', function ($data) {
                $module_name = $this->module_name;

                return view('backend.includes.action_column', compact('module_name', 'data'));
            })
            ->editColumn('name', function ($data) {

                if(App::currentLocale() == 'en'){
                    if($data->translate('en')) {
                        return '<strong>'.$data->translate('en')->name.'</strong>';
                    }
                }
                if(App::currentLocale() == 'ar'){
                    if($data->translate('ar')) {
                        return '<strong>'.$data->translate('ar')->name.'</strong>';
                    }
                }
                if(App::currentLocale() == 'fr'){
                    if($data->translate('fr')) {
                        return '<strong>'.$data->translate('fr')->name.'</strong>';
                    }
                }
                if(App::currentLocale() == 'ru'){
                    if($data->translate('ru')) {
                        return '<strong>'.$data->translate('ru')->name.'</strong>';
                    }
                }


                return '';
            })
//            ->editColumn('title', '<strong>{{$title}}</strong>')
            ->editColumn('image','<img src="{{ url("frontend/testimonial/$image") }}" height="150" width="200" />')
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
            ->filterColumn('name', function($query, $keyword) {
                $sql = "testimonial_translations.name  like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->rawColumns(['name','image','status','action'])
            ->orderColumns(['testimonials.id'], '-:column $1')
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
        $module_title = __('testimonial.testimonial_title');
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
        $module_title = __('testimonial.testimonial_title');

        $validator = Validator::make($request->all(),[

            'name_en' => 'required|max:255|regex:/^[a-zA-Z0-9\s]+$/',
            'comment_en' => 'required',
            'name_ar' => 'required|max:255',
            'comment_ar' => 'required',
            'name_fr' => 'required|max:255',
            'comment_fr' => 'required',
            'name_ru' => 'required|max:255',
            'comment_ru' => 'required',
            'rating' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'date' => 'required|date',
            'status' =>'required|in:active,inactive',
        ],
        [
            'name_en.required' => 'Name in En is required',
            'name_en.regex' => 'Name in En does not allow special characters',
            'comment_en.required' => 'Comment in En is required',
            'name_ar.required' => 'Name in Ar is required',
            'comment_ar.required' => 'Comment in Ar is required',
            'name_fr.required' => 'Name in Fr is required',
            'comment_fr.required' => 'Comment in Fr is required',
            'name_ru.required' => 'Name in Ru is required',
            'comment_ru.required' => 'Comment in Ru is required',

        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'message' => '',
                'errors' => $validator->errors()
            ]);
        }


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // $image_name = time().'.'.$image->getClientOriginalExtension();
            // $destinationPath = base_path('public/frontend/testimonial');
            // $image->move($destinationPath, $image_name);
            $image_name = uploadImage("frontend/testimonial", $image, $request->input('name_en'),null,true);

        }

        $$module_name_singular = $module_model::create([
            'en' => [
                'name'              => $request->name_en,
                'comment'       => $request->comment_en,
            ],
            'ar' => [
                'name'              => $request->name_ar,
                'comment'       => $request->comment_ar,
            ],
            'fr' => [
                'name'              => $request->name_fr,
                'comment'       => $request->comment_fr,
            ],
            'ru' => [
                'name'              => $request->name_ru,
                'comment'       => $request->comment_ru,
            ],
            'status' => $request->status,
            'rating' => $request->rating,
            'date' => $request->date,
            'image' => $image_name ?? ""
        ]);

        //$$module_name_singular = $module_model::create($request->all());

        flash("<i class='fas fa-check'></i> New ".Str::singular($module_title).__('common.add_data'))->success()->important();

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
        $module_title = __('testimonial.testimonial_title');

        $$module_name_singular = $module_model::findOrFail($id);
        $image = $$module_name_singular->image;

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

        return view(
            "$module_path.$module_name.show",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_name_singular', 'module_action','image', "$module_name_singular")
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
        $module_title = __('testimonial.testimonial_title');

        $$module_name_singular = $module_model::findOrFail($id);
        $image = $$module_name_singular->image;

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

        return view(
            "$module_path.$module_name.edit",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'image','module_name_singular', "$module_name_singular")
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
        $module_title = __('testimonial.testimonial_title');

        $validator = Validator::make($request->all(),[

            'name_en' => 'required|max:255|regex:/^[a-zA-Z0-9\s]+$/',
            'comment_en' => 'required',
            'name_ar' => 'required|max:255',
            'comment_ar' => 'required',
            'name_fr' => 'required|max:255',
            'comment_fr' => 'required',
            'name_ru' => 'required|max:255',
            'comment_ru' => 'required',
            'rating' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,webp|max:2048',
            'date' => 'required|date',
            'status' =>'required|in:active,inactive',
        ],
        [
            'name_en.required' => 'Name in En is required',
            'name_en.regex' => 'Name in En does not allow special characters',
            'comment_en.required' => 'Comment in En is required',
            'name_ar.required' => 'Name in Ar is required',
            'comment_ar.required' => 'Comment in Ar is required',
            'name_fr.required' => 'Name in Fr is required',
            'comment_fr.required' => 'Comment in Fr is required',
            'name_ru.required' => 'Name in Ru is required',
            'comment_ru.required' => 'Comment in Ru is required',

        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'message' => '',
                'errors' => $validator->errors()
            ]);
        }

        $$module_name_singular = $module_model::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // $image_name = time().'.'.$image->getClientOriginalExtension();
            // $destinationPath = base_path('public/frontend/testimonial');
            // $image->move($destinationPath, $image_name);
            $image_name = uploadImage("frontend/testimonial", $image, $request->input('name_en'), $$module_name_singular->image,true);

            $$module_name_singular->update([
                'en' => [
                    'name'              => $request->name_en,
                    'comment'       => $request->comment_en,
                ],
                'ar' => [
                    'name'              => $request->name_ar,
                    'comment'       => $request->comment_ar,
                ],
                'fr' => [
                    'name'              => $request->name_fr,
                    'comment'       => $request->comment_fr,
                ],
                'ru' => [
                    'name'              => $request->name_ru,
                    'comment'       => $request->comment_ru,
                ],
                'status' => $request->status,
                'rating' => $request->rating,
                'date'   => $request->date,
                'image' => $image_name
            ]);

        }else{
            $$module_name_singular->update([
                'en' => [
                    'name'              => $request->name_en,
                    'comment'       => $request->comment_en,
                ],
                'ar' => [
                    'name'              => $request->name_ar,
                    'comment'       => $request->comment_ar,
                ],
                'fr' => [
                    'name'              => $request->name_fr,
                    'comment'       => $request->comment_fr,
                ],
                'ru' => [
                    'name'              => $request->name_ru,
                    'comment'       => $request->comment_ru,
                ],
                'status' => $request->status,
                'rating' => $request->rating,
                'date'   => $request->date,
            ]);
        }



        flash("<i class='fas fa-check'></i> ".Str::singular($module_title).__('common.updated_data'))->success()->important();

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

        return response()->json([
            'status' => 1,
            'message' => "<i class='fas fa-check'></i> New '" . Str::singular($module_title) . "' Added",
            'data' => [
                'redirect' => route("backend.$module_name.show", $$module_name_singular->id)
            ]
        ]);

        //return redirect()->route("backend.$module_name.show", $$module_name_singular->id);
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
        $module_title = __('testimonial.testimonial_title');

        $$module_name_singular = $module_model::findOrFail($id);

        $$module_name_singular->delete();

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
        $module_title = __('testimonial.testimonial_title');

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
        $module_title = __('testimonial.testimonial_title');

        $$module_name_singular = $module_model::withTrashed()->find($id);
        $$module_name_singular->restore();

        flash("<i class='fas fa-check'></i> ".Str::singular($module_title).__('common.restored_data'))->success()->important();

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

        return redirect("admin/$module_name");
    }

}
