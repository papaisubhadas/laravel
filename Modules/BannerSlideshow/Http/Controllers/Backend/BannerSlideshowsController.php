<?php

namespace Modules\BannerSlideshow\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class BannerSlideshowsController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = __('banner.banner_title');

        // module name
        $this->module_name = 'bannerslideshows';

        // directory path of the module
        $this->module_path = 'bannerslideshow::backend';

        // module icon
        $this->module_icon = 'fa-solid fa-film';

        // module model name, path
        $this->module_model = "Modules\BannerSlideshow\Models\BannerSlideshow";
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
        $module_title = __('banner.banner_title');

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
        $module_title = __('banner.banner_title');

        $term = trim($request->q);

        if (empty($term)) {
            return response()->json([]);
        }

//        $query_data = $module_model::leftjoin('car_type_translations', 'car_types.id', '=', 'car_type_translations.car_type_id')
//            ->select('car_types.id AS id','car_type_translations.title AS title','car_types.slug AS slug')
//            ->where('car_type_translations.title', 'LIKE', "%$term%")
//            ->orWhere('car_types.slug', 'LIKE', "%$term%")->limit(7)->get();


        $query_data = $module_model::where('title', 'LIKE', "%$term%")->orWhere('slug', 'LIKE', "%$term%")->limit(7)->get();

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
        $module_title = __('banner.banner_title');

        $page_heading = label_case($module_title);
        $title = $page_heading.' '.label_case($module_action);

        //$$module_name = $module_model::select('*');

        $$module_name = $module_model::leftjoin('banner_slideshow_translations', 'banner_slideshows.id', '=', 'banner_slideshow_translations.banner_slideshow_id')
            ->select('banner_slideshows.*' ,'banner_slideshow_translations.title AS banner_slideshow_title')
            ->where('banner_slideshow_translations.locale','=',App::currentLocale())
            ->orderBy('banner_slideshows.id','DESC');

        $data = $$module_name;

        return Datatables::of($$module_name)
            ->addColumn('action', function ($data) {
                $module_name = $this->module_name;

                return view('backend.includes.action_column', compact('module_name', 'data'));
            })
            ->editColumn('banner_slideshow_title', function ($data) {

                if(App::currentLocale() == 'en'){
                    if($data->translate('en')) {
                        return '<strong>'.$data->translate('en')->title.'</strong>';
                    }
                }
                if(App::currentLocale() == 'ar'){
                    if($data->translate('ar')) {
                        return '<strong>'.$data->translate('ar')->title.'</strong>';
                    }
                }
                if(App::currentLocale() == 'fr'){
                    if($data->translate('fr')) {
                        return '<strong>'.$data->translate('fr')->title.'</strong>';
                    }
                }
                if(App::currentLocale() == 'ru'){
                    if($data->translate('ru')) {
                        return '<strong>'.$data->translate('ru')->title.'</strong>';
                    }
                }


                return '';
            })
            ->editColumn('image','<img src="{{ url("frontend/sliders/$image") }}" height="150" width="200" />')
            ->editColumn('status', function ($data) {
                if($data->status == 'active')
                {
                    $set_status = '<span class="badge bg-success">Active</span>';
                }else{
                    $set_status = '<span class="badge bg-danger">In Active</span>';
                }

                return $set_status;
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
            ->filterColumn('banner_slideshow_title', function($query, $keyword) {
                $sql = "banner_slideshow_translations.title  like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->rawColumns(['banner_slideshow_title','image','status','action'])
            ->orderColumns(['banner_slideshows.id'], '-:column $1')
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
        $module_title = __('banner.banner_title');

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
        $module_title = __('banner.banner_title');

        $validator = Validator::make($request->all(),[
            'title_en' => 'required|max:255',
            'sub_title_en' => 'required|max:1000',
            'title_ar' => 'required|max:255',
            'sub_title_ar' => 'required|max:1000',
            'title_fr' => 'required|max:255',
            'sub_title_fr' => 'required|max:1000',
            'title_ru' => 'required|max:255',
            'sub_title_ru' => 'required|max:1000',
            'image' => 'required',
            // 'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            'status' =>'required|in:active,inactive',
        ],
        [
            'title_en.required' => 'Title in En is required',
            'sub_title_en.required' => 'Sub Title in En is required',
            'title_ar.required' => 'Title in Ar is required',
            'sub_title_ar.required' => 'Sub Title in Ar is required',
            'title_fr.required' => 'Title in Fr is required',
            'sub_title_fr.required' => 'Sub Title in Fr is required',
            'title_ru.required' => 'Title in Ru is required',
            'sub_title_ru.required' => 'Sub Title in Ru is required',
            'image.required' => 'Image is required',
            'status.required' => 'Status is required',

        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'message' => '',
                'errors' => $validator->errors()
            ]);
        }

        /*if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = base_path('public/frontend/sliders');
            $image->move($destinationPath, $image_name);

        }*/

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if(!in_array($image->getClientOriginalExtension(),['jpeg','png','jpg','gif'])){
                return response()->json([
                    'status' => 0,
                    'message' => '',
                    'errors' => 'Sorry, Only image allowed for banner.'
                ]);
            }
            // $image_name = time().'.'.$image->getClientOriginalExtension();
            // $destinationPath = base_path('public/frontend/sliders');
            // $image->move($destinationPath, $image_name);
            $image_name = uploadImage("frontend/sliders", $image, $request->input('title_en'),null,true);

        }

        $$module_name_singular = $module_model::create([
            'en' => [
                'title'              => $request->title_en,
                'sub_title'       => $request->sub_title_en,
            ],
            'ar' => [
                'title'              => $request->title_ar,
                'sub_title'       => $request->sub_title_ar,
            ],
            'fr' => [
                'title'              => $request->title_fr,
                'sub_title'       => $request->sub_title_fr,
            ],
            'ru' => [
                'title'              => $request->title_ru,
                'sub_title'       => $request->sub_title_ru,
            ],
            'status' => $request->status,
            'image' => $image_name ?? ""
        ]);

        flash("<i class='fas fa-check'></i> ".Str::singular($module_title).__('common.add_data'))->success()->important();

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

        return response()->json([
            'status' => 1,
            'message' => "<i class='fas fa-check'></i> New '" . Str::singular($module_title) . "' Added",
            'data' => [
                'redirect' => url("admin/$module_name")
            ]
        ]);



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
        $module_title = __('banner.banner_title');

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
        $module_title = __('banner.banner_title');

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
        $module_title = __('banner.banner_title');

        $validator = Validator::make($request->all(),[
            'title_en' => 'required|max:255',
            'sub_title_en' => 'required|max:1000',
            'title_ar' => 'required|max:255',
            'sub_title_ar' => 'required|max:1000',
            'title_fr' => 'required|max:255',
            'sub_title_fr' => 'required|max:1000',
            'title_ru' => 'required|max:255',
            'sub_title_ru' => 'required|max:1000',
            'image' => 'mimes:jpeg,png,jpg,gif,webp',
            'status' =>'required|in:active,inactive',
        ],
        [
            'title_en.required' => 'Title in En is required',
            'sub_title_en.required' => 'Sub Title in En is required',
            'title_ar.required' => 'Title in Ar is required',
            'sub_title_ar.required' => 'Sub Title in Ar is required',
            'title_fr.required' => 'Title in Fr is required',
            'sub_title_fr.required' => 'Sub Title in Fr is required',
            'title_ru.required' => 'Title in Ru is required',
            'sub_title_ru.required' => 'Sub Title in Ru is required',
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'message' => '',
                'errors' => $validator->errors()
            ]);
        }

        $$module_name_singular = $module_model::findOrFail($id);
        // $filepath = public_path('frontend/sliders').'/'.$$module_name_singular->image;
        if ($request->hasFile('image')) {
            // if(File::exists($filepath)){
            //     File::delete($filepath);
            // }
            $image = $request->file('image');
            // $image_name = time().'.'.$image->getClientOriginalExtension();
            // $destinationPath = base_path('public/frontend/sliders');
            // $image->move($destinationPath, $image_name);
            $image_name = uploadImage("frontend/sliders", $image, $request->input('title_en'), $$module_name_singular->image,true);

            $$module_name_singular->update([
                'en' => [
                    'title'              => $request->title_en,
                    'sub_title'       => $request->sub_title_en,
                ],
                'ar' => [
                    'title'              => $request->title_ar,
                    'sub_title'       => $request->sub_title_ar,
                ],
                'fr' => [
                    'title'              => $request->title_fr,
                    'sub_title'       => $request->sub_title_fr,
                ],
                'ru' => [
                    'title'              => $request->title_ru,
                    'sub_title'       => $request->sub_title_ru,
                ],
                'status' => $request->status,
                'image' => $image_name
            ]);

        }else{
            $$module_name_singular->update([
                'en' => [
                    'title'              => $request->title_en,
                    'sub_title'       => $request->sub_title_en,
                ],
                'ar' => [
                    'title'              => $request->title_ar,
                    'sub_title'       => $request->sub_title_ar,
                ],
                'fr' => [
                    'title'              => $request->title_fr,
                    'sub_title'       => $request->sub_title_fr,
                ],
                'ru' => [
                    'title'              => $request->title_ru,
                    'sub_title'       => $request->sub_title_ru,
                ],
                'status' => $request->status,
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
        $module_title = __('banner.banner_title');

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
        $module_title = __('banner.banner_title');

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
        $module_title = __('banner.banner_title');

        $$module_name_singular = $module_model::withTrashed()->find($id);
        $$module_name_singular->restore();

        flash("<i class='fas fa-check'></i> ".Str::singular($module_title).__('common.restored_data'))->success()->important();

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

        return redirect("admin/$module_name");
    }
     //Delete Details
     public function delete_details($id){
        $module_name = $this->module_name;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);
        $$module_name_singular = $module_model::findOrFail($id);
        $filepath = public_path('frontend/sliders').'/'.$$module_name_singular->image;
        if(File::exists($filepath)){
            File::delete($filepath);
        }
        $$module_name_singular->forceDelete();
        session()->flash('alert-delete', 'Banner Slide Show has been Delete successfully');
        return response()->json([
            'redirect_url' => '/admin/bannerslideshows/'
        ]);

    }

}
