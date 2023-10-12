<?php

namespace Modules\CarBrand\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Modules\Faq\Models\Faq;
use Modules\Car\Models\Car;
use Modules\Faq\Models\FaqQaDetail;
use Modules\Faq\Models\FaqQaDetailTranslation;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Artisan;

class CarBrandsController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = __('car-brand.car_brands');

        // module name
        $this->module_name = 'carbrands';

        // directory path of the module
        $this->module_path = 'carbrand::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\CarBrand\Models\CarBrand";
    }

    public function show($id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.show');
        $module_title = __('car-brand.car_brands');

        $$module_name_singular = $module_model::findOrFail($id);
        $image = $$module_name_singular->image;

        logUserAccess($module_title . ' ' . $module_action . ' | Id: ' . $$module_name_singular->id);

        return view(
            "$module_path.$module_name.show",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_name_singular', 'module_action', 'image', "$module_name_singular")
        );

    }

    public function index()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.list');
        $module_title = __('car-brand.car_brands');

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
        $module_title = __('car-brand.car_brands');

        $term = trim($request->q);

        if (empty($term)) {
            return response()->json([]);
        }
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
        $module_title = __('car-brand.car_brands');

        $page_heading = label_case($module_title);
        $title = $page_heading . ' ' . label_case($module_action);

        $$module_name = $module_model::select('*');
        $$module_name = $module_model::leftjoin('car_brand_translations', 'car_brands.id', '=', 'car_brand_translations.car_brand_id')
            ->select('car_brands.*', 'car_brand_translations.title AS title')
            ->where('car_brand_translations.locale', '=', App::currentLocale())
            ->orderBy('car_brands.id', 'DESC');
        $data = $$module_name;


        return Datatables::of($$module_name)
            ->addColumn('action', function ($data) {
                $module_name = $this->module_name;

                return view('backend.includes.action_column', compact('module_name', 'data'));
            })
            ->editColumn('title', function ($data) {
                if ($data->translate(App::currentLocale())) {
                    return '<strong>' . $data->translate(App::currentLocale())->title . '</strong>';
                }
                return '';
            })
            ->editColumn('image', function ($image) {
                if (file_exists(public_path("/frontend/image/{$image->image}"))){
                    $img = "<img src='" . url("frontend/image/{$image->image}") . "' width='80' />";
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
            ->filterColumn('title', function ($query, $keyword) {
                $sql = "car_brand_translations.title  like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->rawColumns(['title', 'image', 'status', 'action'])
            ->orderColumns(['car_brands.id'], '-:column $1')
            ->make(true);
    }

    public function create()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_path = $this->module_path;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.create');
        $module_title = __('car-brand.car_brands');

        $faq = Faq::leftjoin('car_brands', 'faqs.reference_id','=','car_brands.id')
        ->leftjoin('faq_qa_details','faqs.id','=','faq_qa_details.faq_id')
        ->leftjoin('faq_qa_detail_translations','faq_qa_details.id','=','faq_qa_detail_translations.faq_qa_detail_id')
        ->select('faqs.*','faq_qa_detail_translations.*')->where('type','car-brand')
        ->get();

        $faq_en =$faq->where('locale','en');
        $faq_ar =$faq->where('locale','ar');
        $faq_fr =$faq->where('locale','fr');
        $faq_ru =$faq->where('locale','ru');

        Log::info(label_case($module_title . ' ' . $module_action) . ' | User:' . Auth::user()->name . '(ID:' . Auth::user()->id . ')');

        return view(
            "$module_path.$module_name.create",
            compact('module_title', 'module_name', 'module_icon', 'module_path', 'module_name_singular', 'module_action','faq_en','faq_ar','faq_fr','faq_ru')
        );
    }

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
        $module_title = __('car-brand.car_brands');

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
            'slug' => 'max:255',
            'image' => 'required|mimes:png,webp|dimensions:width=600,height=600|max:2048|max:2048',
            'status' => 'required|in:active,inactive',
        ], [
                'image.dimensions' => 'Image must be accepted width 600 and height 600.',
            ]
        );
        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'message' => '',
                'errors' => $validator->errors()
            ]);
        }//success
        else {
        //JM VPN Change
        //feature image code

        $imagename=feature_image('CarBrand',$request->title_en);

            $insert_data = [
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
            ];
            // pr( $insert_data );

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                // $image_name = time() . '.' . $image->getClientOriginalExtension();
                // $destinationPath = base_path('public/frontend/image');
                // $image->move($destinationPath, $image_name);
                // $insert_data["image"] = $image_name;

                $insert_data["image"] = uploadImage("frontend/image", $image, $request->input('title_en'),null,true);
            }

            $$module_name_singular = $module_model::create($insert_data);

            Cache::forget('car_brands-en');
            Cache::forget('car_brands-ar');
            Cache::forget('car_brands-fr');
            Cache::forget('car_brands-ru');

            flash("<i class='fas fa-check'></i> New " . Str::singular($module_title) . __('common.add_data'))->success()->important();

            logUserAccess($module_title . ' ' . $module_action . ' | Id: ' . $$module_name_singular->id);
            return response()->json([
                'status' => 1,
                'message' => "<i class='fas fa-check'></i> " . Str::singular($module_title) . __('common.add_data'),
                'data' => [
                    'redirect' => url("admin/$module_name")
                ]
            ]);
        }
    }

    public function edit($id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.edit');
        $module_title = __('car-brand.car_brands');

        $$module_name_singular = $module_model::findOrFail($id);
        $image = $$module_name_singular->image;

        logUserAccess($module_title . ' ' . $module_action . ' | Id: ' . $$module_name_singular->id);

        $faq = Faq::leftjoin('car_brands', 'faqs.reference_id','=','car_brands.id')
        ->leftjoin('faq_qa_details','faqs.id','=','faq_qa_details.faq_id')
        ->leftjoin('faq_qa_detail_translations','faq_qa_details.id','=','faq_qa_detail_translations.faq_qa_detail_id')
        ->select('faqs.*','faq_qa_detail_translations.*')->where('car_brands.id',$id)->where('type','car-brand')
        ->get();


        $faq_en =$faq->where('locale','en');
        $faq_ar =$faq->where('locale','ar');
        $faq_fr =$faq->where('locale','fr');
        $faq_ru =$faq->where('locale','ru');

        return view(
            "$module_path.$module_name.edit",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'image', 'module_name_singular', "$module_name_singular",'faq_en','faq_ar','faq_fr','faq_ru')
        );
    }

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
        $module_title = __('car-brand.car_brands');

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
            'slug' => 'max:255',
            'image' => 'mimes:png,webp|dimensions:width=600,height=600',
            'status' => ['required','in:active,inactive', function ($attribute, $value, $fail)use ($request, $id) {
                if($request->status == 'inactive'){
                    $car = Car::where('car_brand_id', $id)->get();

                    if(count($car) > 0) {
                        $fail('Status can not be selected "Inactive". Because this car brand has many cars.');
                    }
                }
              }]
        ], [
                'image.dimensions' => 'Image must be accepted width 600 and height 600.',
            ]
        );


        //error come
        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'message' => '',
                'errors' => $validator->errors()
            ]);
        }//success

        $$module_name_singular = $module_model::findOrFail($id);

        $imagename = feature_image('CarBrand',$request->input('title_en'),$$module_name_singular->feature_image);

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
            'status' => $request->status,
        ];
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // $image_name = time() . '.' . $image->getClientOriginalExtension();
            // $destinationPath = base_path('public/frontend/image');
            // $image->move($destinationPath, $image_name);
            // $update_data["image"] = $image_name;
            $update_data["image"] = uploadImage("frontend/image", $image, $request->input('title_en'), $$module_name_singular->image,true);
        }

        $$module_name_singular->update($update_data);
            $car_brand_id =Faq::where('reference_id', $$module_name_singular->id)->where('type','car-brand')->first();
            // dd($car_id);
            if(!empty($car_brand_id)){

                $faq = [
                    'name' => $request->title_en,
                    'slug' =>$request->slug,
                    'status' => $request->status,
                    'type'  => 'car-brand',
                ];
                $faq_add_id = Faq::where('reference_id',$car_brand_id->reference_id)->where('type','car-brand')->first();
                $faq_add_id->update($faq);
            }else{
                if($request->question_en[0]){
                    $faq_add_id = Faq::create([
                        'reference_id'=>$$module_name_singular->id,
                        'name' => $request->title_en,
                        'slug' =>$request->slug,
                        'status' => $request->status,
                        'type'  => 'car-brand',

                    ]);
                }
            }


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
                    if(!empty($question_ens[$index]) && !empty($answer_ens[$index])){
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
                        else {
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
            }
            //updatye Faq qa detail in AR
            $question_ars = $request->question_ar;
            $answer_ars = $request->answer_ar;
            $faq_qa_details_id_ar= $request->faq_qa_details_id_ar;
            if(count($question_ars) > 0) {
                foreach ($question_ars as $index =>$question_ar) {
                    if(!empty($question_ars[$index]) && !empty($answer_ars[$index])){
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
                        else {
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
            }
            //updatye Faq qa detail in FR
            $question_frs = $request->question_fr;
            $answer_frs = $request->answer_fr;
            $faq_qa_details_id_fr= $request->faq_qa_details_id_fr;
            if(count($question_frs) > 0) {
                foreach ($question_frs as $index =>$question_fr) {
                    if(!empty($question_frs[$index]) && !empty($answer_frs[$index])){
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
                        else {
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
            }
            //updatye Faq qa detail in RU
            $question_rus = $request->question_ru;
            $answer_rus = $request->answer_ru;
            $faq_qa_details_id_ru= $request->faq_qa_details_id_ru;
            if(count($question_rus) > 0) {
                foreach ($question_rus as $index =>$question_ru) {
                    if(!empty($question_rus[$index]) && !empty($answer_rus[$index])){
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
                        else {
                            $faq_add_data = [
                                'ru' => [
                                    'question'       => $question_ru,
                                    'answer'      => $answer_rus[$index],
                                ],
                                'faq_id' => $faq_add_id->id,
                            ];
                            $faq_add = FaqQaDetail::create($faq_add_data);
                        }
                    }
                }
            }

        $$module_name_singular->update($update_data);

        Cache::forget('car_brands-en');
        Cache::forget('car_brands-ar');
        Cache::forget('car_brands-fr');
        Cache::forget('car_brands-ru');

        flash("<i class='fas fa-check'></i> " . Str::singular($module_title) . __('common.updated_data'))->success()->important();

        logUserAccess($module_title . ' ' . $module_action . ' | Id: ' . $$module_name_singular->id);

        return response()->json([
            'status' => 1,
            'message' => "<i class='fas fa-check'></i> '" . Str::singular($module_title) . __('common.updated_data'),
            'data' => [
                'redirect' => url("admin/$module_name")
            ]
        ]);
    }

    public function trashed()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.trashlist');
        $module_title = __('car-brand.car_brands');

        $$module_name = $module_model::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate();

        logUserAccess($module_title . ' ' . $module_action);

        return view(
            "$module_path.$module_name.trash",
            compact('module_title', 'module_name', 'module_path', "$module_name", 'module_icon', 'module_name_singular', 'module_action')
        );
    }
    //JM vpn Changes
    public function delete($id){
        Artisan::call("optimize:clear");

        $module_name = $this->module_name;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);
        $$module_name_singular = $module_model::findOrFail($id);
        $data['feature_image'] =null;
        $filepath=public_path("frontend/Feature/CarBrand/".$$module_name_singular->feature_image);
        if(File::exists($filepath)){
            File::delete($filepath);
        }
        $$module_name_singular->update($data);
        return redirect("admin/$module_name");

    }
    //Delete Details
    public function delete_details($id){
        $module_name = $this->module_name;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);
        $$module_name_singular = $module_model::findOrFail($id);
        $filepath=public_path("frontend/Feature/CarBrand/".$$module_name_singular->feature_image);
        $file_path= public_path('frontend/image/'.$$module_name_singular->image);
        if(File::exists($file_path) && File::exists($filepath)){

            File::delete($file_path);
            File::delete($filepath);
          }

        session()->flash('alert-delete', 'Car Brand has been Delete successfully');
        $$module_name_singular->forceDelete();
        $$module_name_singular->cars()->forceDelete();

        Cache::forget('car_brands-en');
        Cache::forget('car_brands-ar');
        Cache::forget('car_brands-fr');
        Cache::forget('car_brands-ru');

        return response()->json(['redirect_url' => '/admin/carbrands/']);

    }

}
