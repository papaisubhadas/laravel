<?php

namespace Modules\CarType\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Modules\Car\Models\Car;
use Yajra\DataTables\DataTables;
use Modules\Faq\Models\Faq;
use Modules\Faq\Models\FaqQaDetail;
use Modules\Faq\Models\FaqQaDetailTranslation;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;


class CarTypesController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = __('cartype.cartypes.index.module_title');

        // module name
        $this->module_name = 'cartypes';

        // directory path of the module
        $this->module_path = 'cartype::backend';

        // module icon
        $this->module_icon = 'fa-solid fa-car-on';

        // module model name, path
        $this->module_model = "Modules\CarType\Models\CarType";
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
        $module_title = __('cartype.cartypes.index.module_title');

        $$module_name = $module_model::paginate();

        logUserAccess($module_title . ' ' . $module_action);

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
        $module_title = __('cartype.cartypes.index.module_title');

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
                'text' => $row->title . ' (Slug: ' . $row->slug . ')',
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
        $module_title = __('cartype.cartypes.index.module_title');

        $page_heading = label_case($module_title);
        $title = $page_heading . ' ' . label_case($module_action);

        $$module_name = $module_model::leftjoin('car_type_translations', 'car_types.id', '=', 'car_type_translations.car_type_id')
            ->select('car_types.*', 'car_type_translations.title AS car_type_name')
            ->where('car_type_translations.locale', '=', App::currentLocale())
            ->orderBy('car_types.id', 'DESC');

        // $$module_name = $module_model::select('*');


        $data = $$module_name;

        return Datatables::of($$module_name)
            ->addColumn('action', function ($data) {
                $module_name = $this->module_name;

                return view('backend.includes.action_column', compact('module_name', 'data'));
            })
            ->editColumn('car_type_name', function ($data) {

                if (App::currentLocale() == 'en') {
                    if ($data->translate('en')) {
                        return '<strong>' . $data->translate('en')->title . '</strong>';
                    }
                }
                if (App::currentLocale() == 'ar') {
                    if ($data->translate('ar')) {
                        return '<strong>' . $data->translate('ar')->title . '</strong>';
                    }
                }
                if (App::currentLocale() == 'fr') {
                    if ($data->translate('fr')) {
                        return '<strong>' . $data->translate('fr')->title . '</strong>';
                    }
                }
                if (App::currentLocale() == 'ru') {
                    if ($data->translate('ru')) {
                        return '<strong>' . $data->translate('ru')->title . '</strong>';
                    }
                }


                return '';
            })
            ->editColumn('image', function ($image) {
                if (file_exists(public_path("/frontend/image/{$image->image}"))){
                    $img = "<img src='" . url("frontend/image/{$image->image}") . "' height='150' width='200' />";
                    return $img;
                } else {
                    return '';
                }
            })
            ->editColumn('status', function ($data) {
                if ($data->status == 'active') {
                    $is_featured = '<span class="badge bg-success">Active</span>';
                } else {
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
            ->filterColumn('car_type_name', function ($query, $keyword) {
                $sql = "car_type_translations.title  like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->rawColumns(['car_type_name', 'image', 'status', 'action'])
            ->orderColumns(['car_type.id'], '-:column $1')
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
        $module_title = __('cartype.cartypes.index.module_title');

        $faq = Faq::leftjoin('car_types', 'faqs.reference_id','=','car_types.id')
        ->leftjoin('faq_qa_details','faqs.id','=','faq_qa_details.faq_id')
        ->leftjoin('faq_qa_detail_translations','faq_qa_details.id','=','faq_qa_detail_translations.faq_qa_detail_id')
        ->select('faqs.*','faq_qa_detail_translations.*')->where('type','car-type')
        ->get();

        $faq_en =$faq->where('locale','en');
        $faq_ar =$faq->where('locale','ar');
        $faq_fr =$faq->where('locale','fr');
        $faq_ru =$faq->where('locale','ru');

        logUserAccess($module_title . ' ' . $module_action);

        return view(
            "$module_path.$module_name.create",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_name_singular', 'module_action','faq_en','faq_ar','faq_fr','faq_ru')
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
        $module_title = __('cartype.cartypes.index.module_title');

        $validator = Validator::make($request->all(), [
            'title_en' => 'required|max:255|unique:car_type_translations,title',
            'custom_title_en' => 'required|max:255',
            'description_en' => 'required',
            'title_ar' => 'required|max:255|unique:car_type_translations,title',
            'custom_title_ar' => 'required|max:255',
            'description_ar' => 'required',
            'title_fr' => 'required|max:255|unique:car_type_translations,title',
            'custom_title_fr' => 'required|max:255',
            'description_fr' => 'required',
            'title_ru' => 'required|max:255|unique:car_type_translations,title',
            'custom_title_ru' => 'required|max:255',
            'description_ru' => 'required',
            'slug' => 'required|max:255|regex:/^[a-z0-9-]+$/',
            'image' => 'required|mimes:png,webp|dimensions:width=600,height=600|max:2048',
            // 'image' => 'required|mimes:jpeg,png,jpg,gif|dimensions:max_width=210,height=131|max:2048',
            'status' => 'required|in:active,inactive',
        ],
            [
                'title_en.required' => 'Title in En is required',
                'custom_title_en.required' => 'Custom title in En is required',
                'title_en.regex' => 'Title in En does not allow special characters',
                'description_en.required' => 'Description in En is required',
                'title_ar.required' => 'Title in Ar is required',
                'custom_title_ar.required' => 'Custom title in Ar is required',
                'description_ar.required' => 'Description in Ar is required',
                'title_fr.required' => 'Title in Fr is required',
                'custom_title_fr.required' => 'Custom title in Fr is required',
                'description_fr.required' => 'Description in Fr is required',
                'title_ru.required' => 'Title in Ru is required',
                'custom_title_ru.required' => 'Custom title in Ru is required',
                'description_ru.required' => 'Description in Ru is required',
                'image.dimensions' => 'Image must be accepted width 600 and height 600.',
                'slug.regex' => 'Slug should be in URL valid format.'
            ]);

        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'message' => '',
                'errors' => $validator->errors()
            ]);
        }
        $mainImageName = "";
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // $image_name = time() . '.' . $image->getClientOriginalExtension();
            // $destinationPath = base_path('public/frontend/image');
            // $image->move($destinationPath, $image_name);
            $mainImageName = uploadImage("frontend/image", $image, $request->input('title_en'),null,true);

        }
         //JM VPN Change
        //feature image code

        $imagename=feature_image('CarType',$request->title_en);

        $$module_name_singular = $module_model::create([
            'en' => [
                'title' => $request->title_en,
                'description' => $request->description_en,
                'custom_title' => $request->custom_title_en,
                'meta_title' => $request->meta_title_en,
                'meta_description' => $request->meta_description_en,
                'meta_keyword' => $request->meta_keyword_en,
            ],
            'ar' => [
                'title' => $request->title_ar,
                'description' => $request->description_ar,
                'custom_title' => $request->custom_title_ar,
                'meta_title' => $request->meta_title_ar,
                'meta_description' => $request->meta_description_ar,
                'meta_keyword' => $request->meta_keyword_ar,
            ],
            'fr' => [
                'title' => $request->title_fr,
                'description' => $request->description_fr,
                'custom_title' => $request->custom_title_fr,
                'meta_title' => $request->meta_title_fr,
                'meta_description' => $request->meta_description_fr,
                'meta_keyword' => $request->meta_keyword_fr,
            ],
            'ru' => [
                'title' => $request->title_ru,
                'description' => $request->description_ru,
                'custom_title' => $request->custom_title_ru,
                'meta_title' => $request->meta_title_ru,
                'meta_description' => $request->meta_description_ru,
                'meta_keyword' => $request->meta_keyword_ru,
            ],
            'slug' => $request->slug,
            'feature_image'=> !empty($imagename['image_en'])  ?   $imagename['image_en']  : '',//JM VPN Change
            'status' => $request->status,
            'image' => $mainImageName ? $mainImageName : $imagename
        ]);

        //$$module_name_singular = $module_model::create($request->all());

        Cache::forget('car_types-en');
        Cache::forget('car_types-ar');
        Cache::forget('car_types-fr');
        Cache::forget('car_types-ru');

        flash("<i class='fas fa-check'></i> " . Str::singular($module_title) . __('common.add_data'))->success()->important();

        logUserAccess($module_title . ' ' . $module_action . ' | Id: ' . $$module_name_singular->id);

        return response()->json([
            'status' => 1,
            'message' => "<i class='fas fa-check'></i> " . Str::singular($module_title) . __('common.add_data'),
            'data' => [
                'redirect' => url("admin/$module_name")
            ]
        ]);
        //return redirect("admin/$module_name");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
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
        $module_title = __('cartype.cartypes.index.module_title');

        $$module_name_singular = $module_model::findOrFail($id);
        $image = $$module_name_singular->image;

        logUserAccess($module_title . ' ' . $module_action . ' | Id: ' . $$module_name_singular->id);

        return view(
            "$module_path.$module_name.show",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_name_singular', 'module_action', 'image', "$module_name_singular")
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
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
        $module_title = __('cartype.cartypes.index.module_title');

        $$module_name_singular = $module_model::findOrFail($id);
        $image = $$module_name_singular->image;

        $faq = Faq::leftjoin('car_types', 'faqs.reference_id','=','car_types.id')
        ->leftjoin('faq_qa_details','faqs.id','=','faq_qa_details.faq_id')
        ->leftjoin('faq_qa_detail_translations','faq_qa_details.id','=','faq_qa_detail_translations.faq_qa_detail_id')
        ->select('faqs.*','faq_qa_detail_translations.*')->where('car_types.id',$id)->where('type','car-type')
        ->get();


        $faq_en =$faq->where('locale','en');
        $faq_ar =$faq->where('locale','ar');
        $faq_fr =$faq->where('locale','fr');
        $faq_ru =$faq->where('locale','ru');

        logUserAccess($module_title . ' ' . $module_action . ' | Id: ' . $$module_name_singular->id);

        return view(
            "$module_path.$module_name.edit",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'image', 'module_name_singular', "$module_name_singular",'faq_en','faq_ar','faq_fr','faq_ru')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
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
        $module_title = __('cartype.cartypes.index.module_title');

        $validator = Validator::make($request->all(), [
            'title_en' => 'required|max:255',
            'custom_title_en' => 'required|max:255',
            'description_en' => 'required',
            'title_ar' => 'required|max:255',
            'custom_title_ar' => 'required|max:255',
            'description_ar' => 'required',
            'title_fr' => 'required|max:255',
            'custom_title_fr' => 'required|max:255',
            'description_fr' => 'required',
            'title_ru' => 'required|max:255',
            'custom_title_ru' => 'required|max:255',
            'description_ru' => 'required',
            'slug' => 'required|max:255|regex:/^[a-z0-9-]+$/',
            'image' => 'mimes:png,webp|dimensions:width=600,height=600',
            'status' => ['required','in:active,inactive', function ($attribute, $value, $fail)use ($request, $id) {
                if($request->status == 'inactive'){
                    $car = Car::where('car_type_id', $id)->get();

                    if(count($car) > 0) {
                        $fail('Status can not be selected "Inactive". Because this car type has many cars.');
                    }
                }
            }],
        ],
            [
                'title_en.required' => 'Title in En is required',
                'custom_title_en.required' => 'Custom title in En is required',
                'title_en.regex' => 'Title in En does not allow special characters',
                'description_en.required' => 'Description in En is required',
                'title_ar.required' => 'Title in Ar is required',
                'custom_title_ar.required' => 'Custom title in Ar is required',
                'description_ar.required' => 'Description in Ar is required',
                'title_fr.required' => 'Title in Fr is required',
                'custom_title_fr.required' => 'Custom title in Fr is required',
                'description_fr.required' => 'Description in Fr is required',
                'title_ru.required' => 'Title in Ru is required',
                'custom_title_ru.required' => 'Custom title in Ru is required',
                'description_ru.required' => 'Description in Ru is required',
                'image.dimensions' => 'Image must be accepted width 600 and height 600.',
                'slug.regex' => 'Slug should be in URL valid format.'
            ]);

        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'message' => '',
                'errors' => $validator->errors()
            ]);
        }

        $$module_name_singular = $module_model::findOrFail($id);
        //feature image code

        $imagename=feature_image('CarType',$request->title_en, $$module_name_singular->feature_image);


        $update_data = [
            'en' => [
                'title' => $request->title_en,
                'description' => $request->description_en,
                'custom_title' => $request->custom_title_en,
                'meta_title' => $request->meta_title_en,
                'meta_description' => $request->meta_description_en,
                'meta_keyword' => $request->meta_keyword_en,
            ],
            'ar' => [
                'title' => $request->title_ar,
                'description' => $request->description_ar,
                'custom_title' => $request->custom_title_ar,
                'meta_title' => $request->meta_title_ar,
                'meta_description' => $request->meta_description_ar,
                'meta_keyword' => $request->meta_keyword_ar,
            ],
            'fr' => [
                'title' => $request->title_fr,
                'description' => $request->description_fr,
                'custom_title' => $request->custom_title_fr,
                'meta_title' => $request->meta_title_fr,
                'meta_description' => $request->meta_description_fr,
                'meta_keyword' => $request->meta_keyword_fr,
            ],
            'ru' => [
                'title' => $request->title_ru,
                'description' => $request->description_ru,
                'custom_title' => $request->custom_title_ru,
                'meta_title' => $request->meta_title_ru,
                'meta_description' => $request->meta_description_ru,
                'meta_keyword' => $request->meta_keyword_ru,
            ],
            'slug' => $request->slug,
            'feature_image'=>  !empty($imagename['image_en'])  ?   $imagename['image_en']  : $$module_name_singular->feature_image, //JM VPN Change
            'status' => $request->status
        ];
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // $image_name = time() . '.' . $image->getClientOriginalExtension();
            // //$destinationPath = str_replace('/','\\',base_path('public/frontend/image'));
            // $destinationPath = base_path('public/frontend/image');
            // $image->move($destinationPath, $image_name);
            $update_data['image'] = uploadImage("frontend/image", $image, $request->input('title_en'), $$module_name_singular->image,true);
        }

        $$module_name_singular->update($update_data);

        $car_type_id =Faq::where('reference_id', $$module_name_singular->id)->where('type','car-type')->first();

        if(!empty($car_type_id)){
            $faq = [
                'name' => $request->title_en,
                'slug' =>$request->slug,
                'status' => $request->status,
                'type'  => 'car-type',
            ];
            $faq_add_id = Faq::where('reference_id',$car_type_id->reference_id)->where('type','car-type')->first();
            $faq_add_id->update($faq);
        }else{
            if($request->question_en[0]){
                $faq_add_id = Faq::create([
                    'reference_id'=>$$module_name_singular->id,
                    'name' => $request->title_en,
                    'slug' =>$request->slug,
                    'status' => $request->status,
                    'type'  => 'car-type',

                ]);
            }
        }
// dd($faq_add_id);
        //delete Faq Question Answer
        $delete_faq_qa_details_id  = $request->delete_faq_qa_details_id;
        $delete_faq_qa_details_arr = explode(',',$delete_faq_qa_details_id);
        if($request->delete_faq_qa_details_id != NULL) {
            foreach ($delete_faq_qa_details_arr as $delete_faq_qa_detail) {
                $faq_qa_detail = FaqQaDetail::find($delete_faq_qa_detail);
                $faq_qa_detail_trans = FaqQaDetailTranslation::where('faq_qa_detail_id', $delete_faq_qa_detail)->first();
                if(!empty($faq_qa_detail_trans)) {
                    $faq_qa_detail_trans->delete();
                }
                $faq_qa_detail->delete();
            }
        }
        //updatye Faq qa detail in EN
        $question_ens = $request->question_en;
        $answer_ens = $request->answer_en;
        $faq_qa_details_id_en= $request->faq_qa_details_id_en;
        if(count($question_ens) > 0) {
            foreach ($question_ens as $index =>$question_en) {
                if(isset( $faq_qa_details_id_en[$index]) && $faq_qa_details_id_en[$index] != NULL) {
                    $faq_add_data = [
                        'en' => [
                            'question'       => $question_en,
                            'answer'         => $answer_ens[$index],
                        ],
                        'faq_id' => $faq_add_id->id,
                    ];
                    $faq_add = FaqQaDetail::find($faq_qa_details_id_en[$index]);
                    if($faq_add != NULL) {
                        $faq_add->update($faq_add_data);
                    }
                }
                else if(!empty($question_en) && !empty($answer_ens[$index])){
                    $faq_add_data = [
                        'en' => [
                            'question'       => $question_en,
                            'answer'      => $answer_ens[$index],
                        ],
                        'faq_id' => $faq_add_id->id,
                    ];
                    $faq_add = FaqQaDetail::create($faq_add_data);
                }
            }
        }
        //updatye Faq qa detail in AR
        $question_ars = $request->question_ar;
        $answer_ars = $request->answer_ar;
        $faq_qa_details_id_ar= $request->faq_qa_details_id_ar;
        if(count($question_ars) > 0) {
            foreach ($question_ars as $index =>$question_ar) {
                if(isset( $faq_qa_details_id_ar[$index]) && $faq_qa_details_id_ar[$index] != NULL) {
                    $faq_add_data = [
                        'ar' => [
                            'question'       => $question_ar,
                            'answer'         => $answer_ars[$index],
                        ],
                        'faq_id' => $faq_add_id->id,
                    ];
                    $faq_add = FaqQaDetail::find($faq_qa_details_id_ar[$index]);
                    if($faq_add != NULL) {
                        $faq_add->update($faq_add_data);
                    }
                }
                else if(!empty($question_ar) && !empty($answer_ars[$index])){
                    $faq_add_data = [
                        'ar' => [
                            'question'       => $question_ar,
                            'answer'      => $answer_ars[$index],
                        ],
                        'faq_id' => $faq_add_id->id,
                    ];
                    $faq_add = FaqQaDetail::create($faq_add_data);
                }
            }
        }
        //updatye Faq qa detail in FR
        $question_frs = $request->question_fr;
        $answer_frs = $request->answer_fr;
        $faq_qa_details_id_fr= $request->faq_qa_details_id_fr;
        if(count($question_frs) > 0) {
            foreach ($question_frs as $index =>$question_fr) {
                if(isset( $faq_qa_details_id_fr[$index]) && $faq_qa_details_id_fr[$index] != NULL) {
                    $faq_add_data = [
                        'fr' => [
                            'question'       => $question_fr,
                            'answer'         => $answer_frs[$index],
                        ],
                        'faq_id' => $faq_add_id->id,
                    ];
                    $faq_add = FaqQaDetail::find($faq_qa_details_id_fr[$index]);
                    if($faq_add != NULL) {
                        $faq_add->update($faq_add_data);
                    }
                }
                else if(!empty($question_fr) && !empty($answer_frs[$index])){
                    $faq_add_data = [
                        'fr' => [
                            'question'       => $question_fr,
                            'answer'      => $answer_frs[$index],
                        ],
                        'faq_id' => $faq_add_id->id,
                    ];
                    $faq_add = FaqQaDetail::create($faq_add_data);
                }
            }
        }
        //updatye Faq qa detail in RU
        $question_rus = $request->question_ru;
        $answer_rus = $request->answer_ru;
        $faq_qa_details_id_ru= $request->faq_qa_details_id_ru;
        if(count($question_rus) > 0) {
            foreach ($question_rus as $index =>$question_ru) {
                if(isset( $faq_qa_details_id_ru[$index]) && $faq_qa_details_id_ru[$index] != NULL) {

                    $faq_add_data = [
                        'ru' => [
                            'question'       => $question_ru,
                            'answer'         => $answer_rus[$index],
                        ],
                        'faq_id' => $faq_add_id->id,
                    ];
                    $faq_add = FaqQaDetail::find($faq_qa_details_id_ru[$index]);

                    if($faq_add != NULL) {
                        $faq_add->update($faq_add_data);
                    }
                }
                else if(!empty($question_ru) && !empty($answer_rus[$index])){
                    $faq_add_data = [
                        'ru' => [
                            'question'       => $question_ru ,
                            'answer'      => $answer_rus[$index],
                        ],
                        'faq_id' => $faq_add_id->id,
                    ];
                    $faq_add = FaqQaDetail::create($faq_add_data);
                }
            }
        }

        Cache::forget('car_types-en');
        Cache::forget('car_types-ar');
        Cache::forget('car_types-fr');
        Cache::forget('car_types-ru');

        flash("<i class='fas fa-check'></i> " . Str::singular($module_title) . __('common.updated_data'))->success()->important();

        logUserAccess($module_title . ' ' . $module_action . ' | Id: ' . $$module_name_singular->id);

        return response()->json([
            'status' => 1,
            'message' => "<i class='fas fa-check'></i> " . Str::singular($module_title) . __('common.updated_data'),
            'data' => [
                'redirect' => route("backend.$module_name.show", $$module_name_singular->id)
            ]
        ]);
        //return redirect()->route("backend.$module_name.show", $$module_name_singular->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
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
        $module_title = __('cartype.cartypes.index.module_title');

        $$module_name_singular = $module_model::findOrFail($id);

        $$module_name_singular->delete();

        flash("<i class='fas fa-check'></i> " . Str::singular($module_title) . __('common.deleted_data'))->success()->important();

        logUserAccess($module_title . ' ' . $module_action . ' | Id: ' . $$module_name_singular->id);

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
        $module_title = __('cartype.cartypes.index.module_title');

        $$module_name = $module_model::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate();

        logUserAccess($module_title . ' ' . $module_action);

        return view(
            "$module_path.$module_name.trash",
            compact('module_title', 'module_name', 'module_path', "$module_name", 'module_icon', 'module_name_singular', 'module_action')
        );
    }

    /**
     * Restore a soft deleted entry.
     *
     * @param Request $request
     * @param int $id
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
        $module_title = __('cartype.cartypes.index.module_title');

        $$module_name_singular = $module_model::withTrashed()->find($id);
        $$module_name_singular->restore();

        flash("<i class='fas fa-check'></i> " . Str::singular($module_title) . __('common.restored_data'))->success()->important();

        logUserAccess($module_title . ' ' . $module_action . ' | Id: ' . $$module_name_singular->id);

        return redirect("admin/$module_name");
    }
    //JM vpn Changes
    public function delete($id){
        $module_name = $this->module_name;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);
        $$module_name_singular = $module_model::findOrFail($id);
        $data['feature_image'] =null;
        $filepath = public_path('frontend/Feature/CarType').'/'.$$module_name_singular->feature_image;
        if(File::exists($filepath)){
            File::delete($filepath);
        }

        $$module_name_singular->update($data);
        return redirect("admin/$module_name");

    }
      //Delete Details
      public function delete_details(Request $request,$id){
        $module_name = $this->module_name;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);
        $$module_name_singular = $module_model::findOrFail($id);
        $filepath = public_path('frontend/Feature/CarType').'/'.$$module_name_singular->feature_image;
        $file_path= public_path('frontend/image/'.$$module_name_singular->image);

       if(File::exists($file_path)&&File::exists($filepath)){

            File::delete($file_path);
            File::delete($filepath);
          }
        $$module_name_singular->forceDelete();
        $$module_name_singular->cars()->forceDelete();

          Cache::forget('car_types-en');
          Cache::forget('car_types-ar');
          Cache::forget('car_types-fr');
          Cache::forget('car_types-ru');

        session()->flash('alert-delete', 'Car Type has been Delete successfully');
        return response()->json(['redirect_url' => '/admin/cartypes/']);

    }

}
