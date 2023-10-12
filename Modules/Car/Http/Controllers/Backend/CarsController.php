<?php

namespace Modules\Car\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Modules\CarType\Models\CarType;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Modules\Comment\Notifications\NewCommentAdded;
use Yajra\DataTables\DataTables;
use Modules\CarBrand\Models\CarBrand;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Modules\Car\Models\Car;
use Modules\Car\Models\CarTranslation;
use Modules\Car\Models\CarImage;
use Modules\Car\Models\CarFeature;
use Modules\Car\Models\CarFeatureTranslation;
use Modules\Car\Models\CarDeliveryPickUpService;
use Modules\Car\Models\CarDeliveryPickUpServiceTranslation;
use Modules\Car\Models\CarSpecification;
use Modules\Car\Models\CarSpecificationTranslation;
use Modules\Car\Models\CarRentDetail;
use Modules\Car\Models\CarRentDetailTranslation;
use Modules\Car\Models\CarRentalRequirement;
use Modules\Car\Models\CarRentalRequirementTranslation;
use Modules\Car\Models\CarAdditionalDetail;
use Modules\Car\Models\CarRentalInclude;
use Modules\Car\Models\CarRentalIncludeTranslation;
use Modules\Car\Models\CarAdditionalDetailTranslation;
use Modules\Car\Models\CarHasCarType;
use Modules\Faq\Models\Faq;
use Modules\Faq\Models\FaqQaDetail;
use Modules\Faq\Models\FaqQaDetailTranslation;
use Modules\Car\Http\Requests\Backend\CarsRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class CarsController extends BackendBaseController
{
    use Authorizable;

    public $module_path;

    public function __construct()
    {
        // module name
        $this->module_name = 'cars';

        // directory path of the module
        $this->module_path = 'car::backend';

        // module icon
        $this->module_icon = 'fa-solid fa-car';

        // module model name, path
        $this->module_model = "Modules\Car\Models\Car";
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
        $module_title = __('car.cars');

        $$module_name = $module_model::latest()->paginate();

        Log::info(label_case($module_title.' '.$module_action).' | User:'.Auth::user()->name.'(ID:'.Auth::user()->id.')');

        return view(
            "car::backend.$module_name.index_datatable",
            compact('module_title', 'module_name', "$module_name", 'module_icon', 'module_name_singular', 'module_action')
        );
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
        $module_title = __('car.cars');
        $$module_name = $module_model::leftjoin('car_translations', 'cars.id', '=', 'car_translations.car_id')
            ->select('cars.*' ,'car_translations.name AS cars_name')
            ->where('car_translations.locale','=',App::currentLocale())
            ->orderBy('cars.id','DESC');

        $data = $$module_name;
        return Datatables::of($$module_name)
            ->addColumn('action', function ($data) {
                $module_name = $this->module_name;
                return '<div class="text-end">
                            <a href="' . route("backend.$module_name.edit", $data) .'" class="btn btn-primary btn-sm " data-toggle="tooltip" title="Edit Car">
                                <i class="fas fa-wrench"></i>
                            </a>
                            <a href=" ' . route("backend.$module_name.show", $data) . '" class="btn btn-success btn-sm " data-toggle="tooltip" title="Show Car">
                                <i class="fas fa-desktop"></i>
                            </a>
                            <a href="' . route("backend.$module_name.clone", $data) . '" class="btn btn-danger btn-sm " data-toggle="tooltip" title="Show Car">
                                <i class="fas fa-clone"></i>
                            </a>
                        </div>';
            })
            ->addColumn('cars_name', function ($data) {
                $is_featured = ($data->is_featured) ? '<span class="badge bg-primary">Featured</span>' : '';

                if($data->translate(App::currentLocale())) {
                    return $data->translate(App::currentLocale())->name;
                }

                return '';
            })
            ->editColumn('car_type_id', function ($data) {

                if(count($data->car_has_car_types) > 0) {
                    $car_type_str = '';
                    foreach($data->car_has_car_types as $index=>$car_has_car_type) {
                        if($index != 0) {
                            $car_type_str .= ', ';
                        }
                        if(!empty($car_has_car_type->car_type)  && $car_has_car_type->car_type!= NULL && $car_has_car_type->car_type->translate(App::currentLocale())) {
                            $car_type_str .= $car_has_car_type->car_type->translate(App::currentLocale())->title;
                        }
                    }
                    return $car_type_str;
                }

                return '';
            })
            ->editColumn('car_brand_id', function ($data) {
                if(!empty($data->car_brand) && $data->car_brand!= NULL  && $data->car_brand->translate(App::currentLocale()) ) {
                    return $data->car_brand->translate(App::currentLocale())->title;
                }

                return '';
            })
            ->filterColumn('cars_name', function($query, $keyword) {
                $sql = "car_translations.name  like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->rawColumns(['cars_name', 'action'])
            //->orderColumns(['id'], '-:column $1')
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
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_path = $this->module_path;
        $module_name_singular = Str::singular($module_name);

        $module_action =  __('common.create');
        $module_title = __('car.cars');

        Log::info(label_case($module_title.' '.$module_action).' | User:'.Auth::user()->name.'(ID:'.Auth::user()->id.')');

        $car_brands = CarBrand::active()->get();
        $car_types = CarType::active()->get();

        $faq = Faq::leftjoin('cars', 'faqs.reference_id','=','cars.id')
        ->leftjoin('faq_qa_details','faqs.id','=','faq_qa_details.faq_id')
        ->leftjoin('faq_qa_detail_translations','faq_qa_details.id','=','faq_qa_detail_translations.faq_qa_detail_id')
        ->select('faqs.*','faq_qa_detail_translations.*')->where('type','car')
        ->get();

        $faq_en =$faq->where('locale','en');
        $faq_ar =$faq->where('locale','ar');
        $faq_fr =$faq->where('locale','fr');
        $faq_ru =$faq->where('locale','ru');

        return view(
            "car::backend.$module_name.create",
            compact('module_title', 'module_name', 'module_icon', 'module_path', 'module_name_singular', 'module_action', 'car_brands', 'car_types','faq_en','faq_ar','faq_fr','faq_ru')
        );
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        Artisan::call("optimize:clear");

        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.store');
        $module_title = __('car.cars');

        $validator = Validator::make($request->all(), [
            'name_en'               => 'required|max:255',
            'name_ar'               => 'required|max:255',
            'name_fr'               => 'required|max:255',
            'name_ru'               => 'required|max:255',

            'car_custom_title_en'   => 'required|max:255',
            'car_custom_title_ar'   => 'required|max:255',
            'car_custom_title_fr'   => 'required|max:255',
            'car_custom_title_ru'   => 'required|max:255',

            'delivery_en'           => 'required|max:255',
            'delivery_ar'           => 'required|max:255',
            'delivery_fr'           => 'required|max:255',
            'delivery_ru'           => 'required|max:255',

            'insurance_en'          => 'required|max:255',
            'insurance_ar'          => 'required|max:255',
            'insurance_fr'          => 'required|max:255',
            'insurance_ru'          => 'required|max:255',
            'slug'                  =>'required|unique:cars|max:255',
            'car_brand_id'          =>'required',
            'car_type_id'           =>'required',
           // 'deal_type'             =>'required|in:Daily,Weekly,Monthly',
            'car_model_year'        =>'required|numeric|digits:4',
            'deposit'               =>'required|numeric',
            //'kms'                 =>'required|numeric',
            'daily_mileage_limit'   =>'required|numeric',
            'weekly_mileage_limit'  =>'required|numeric',
            'monthly_mileage_limit' =>'required|numeric',
            'min_age'               =>'required|numeric|digits:2',
            'daily_price'           =>'required|numeric',
            'weekly_price'          =>'required|numeric',
            'monthly_price'         =>'required|numeric',
            'is_available'          =>'required|in:yes,no',
            'custom_url_slug'       => 'required|max:255',
            //'is_most_rented'      =>'required|in:yes,no',
            'images.*'              =>'required|mimes:jpeg,jpg,png,webp|max:2048',

            'feature_icon_html.*'   => 'required',
            'specification_icon_html.*'    => 'required',

            'feature_title_en.*'    => 'required|max:255',
            'feature_title_ar.*'    => 'required|max:255',
            'feature_title_fr.*'    => 'required|max:255',
            'feature_title_ru.*'    => 'required|max:255',

            'service_title_en.*'    => 'required|max:255',
            'service_title_ar.*'    => 'required|max:255',
            'service_title_fr.*'    => 'required|max:255',
            'service_title_ru.*'    => 'required|max:255',

            'rent_detail_en.*'      => 'required|max:255',
            'rent_detail_ar.*'      => 'required|max:255',
            'rent_detail_fr.*'      => 'required|max:255',
            'rent_detail_ru.*'      => 'required|max:255',

            'specification_title_en.*' => 'required|max:255',
            'specification_title_ar.*' => 'required|max:255',
            'specification_title_fr.*' => 'required|max:255',
            'specification_title_ru.*' => 'required|max:255',

            'key_en.*'              => 'required|max:255',
            'value_en.*'            => 'required|max:255',
            'key_ar.*'              => 'required|max:255',
            'value_ar.*'            => 'required|max:255',
            'key_fr.*'              => 'required|max:255',
            'value_fr.*'            => 'required|max:255',
            'key_ru.*'              => 'required|max:255',
            'value_ru.*'            => 'required|max:255',

            'rent_key_en.*'         => 'required|max:255',
            'rent_value_en.*'       => 'required|max:255',
            'rent_key_ar.*'         => 'required|max:255',
            'rent_value_ar.*'       => 'required|max:255',
            'rent_key_fr.*'         => 'required|max:255',
            'rent_value_fr.*'       => 'required|max:255',
            'rent_key_ru*'         => 'required|max:255',
            'rent_value_ru.*'       => 'required|max:255',

            'rent_req_key_en.*'     => 'required|max:255',
            'rent_req_value_en.*'   => 'required|max:255',
            'rent_req_key_ar.*'     => 'required|max:255',
            'rent_req_value_ar.*'   => 'required|max:255',
            'rent_req_key_fr.*'     => 'required|max:255',
            'rent_req_value_fr.*'   => 'required|max:255',
            'rent_req_key_ru.*'     => 'required|max:255',
            'rent_req_value_ru.*'   => 'required|max:255',
        ], [
            'images.*.required' => __('car.images_re'),
            'images.*.mimes'    => __('car.image_mimes'),
            'images.*.max'      => __('car.image_max'),

            'feature_title_en.*'=> __('car.feature_title_en_v'),
            'feature_title_ar.*'=> __('car.feature_title_ar_v'),
            'feature_title_fr.*'=> __('car.feature_title_fr_v'),
            'feature_title_ru.*'=> __('car.feature_title_ru_v'),

            'service_title_en.*'=> __('car.service_title_en_v'),
            'service_title_ar.*'=> __('car.service_title_ar_v'),
            'service_title_fr.*'=> __('car.service_title_fr_v'),
            'service_title_ru.*'=> __('car.service_title_ru_v'),

            'rent_detail_en.*'  => __('car.rent_detail_en_v'),
            'rent_detail_ar.*'  => __('car.rent_detail_ar_v'),
            'rent_detail_fr.*'  => __('car.rent_detail_fr_v'),
            'rent_detail_ru.*'  => __('car.rent_detail_ru_v'),

            'specification_title_en.*' => __('car.specification_title_en_v'),
            'specification_title_ar.*' => __('car.specification_title_ar_v'),
            'specification_title_fr.*' => __('car.specification_title_fr_v'),
            'specification_title_ru.*' => __('car.specification_title_ru_v'),

            'key_en.*'           => __('car.key_en_v'),
            'value_en.*'        => __('car.value_en_v'),
            'key_ar.*'           => __('car.key_ar_v'),
            'value_ar.*'        => __('car.value_ar_v'),
            'key_fr.*'           => __('car.kekey_fr_v'),
            'value_fr.*'        => __('car.value_fr_v'),
            'key_ru.*'           => __('car.key_ru_v'),
            'value_ru.*'        => __('car.value_ru_v'),

            'rent_key_en.*'     => __('car.rent_key_en_v'),
            'rent_value_en.*'   => __('car.rent_value_en_v'),
            'rent_key_ar.*'     => __('car.rent_key_ar_v'),
            'rent_value_ar.*'   => __('car.rent_value_ar_v'),
            'rent_key_fr.*'     => __('car.rent_kekey_fr_v'),
            'rent_value_fr.*'   => __('car.rent_value_fr_v'),
            'rent_key_ru.*'     => __('car.rent_key_ru_v'),
            'rent_value_ru.*'   => __('car.rent_value_ru_v'),

            'rent_req_key_en.*' => __('car.rent_req_key_en_v'),
            'rent_req_value_en.*'=> __('car.rent_req_value_en_v'),
            'rent_req_key_ar.*' =>__('car.rent_req_key_ar_v'),
            'rent_req_value_ar.*'=> __('car.rent_req_value_ar_v'),
            'rent_req_key_fr.*' => __('car.rent_req_kekey_fr_v'),
            'rent_req_value_fr.*'=> __('car.rent_req_value_fr_v'),
            'rent_req_key_ru.*' => __('car.rent_req_key_ru_v'),
            'rent_req_value_ru.*'=> __('car.rent_req_value_ru_v'),
        ]);
        //JM VPN Change
        //feature image code
        $imagename=feature_image('Car',$request->name_en);
        //error come
        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'message' => '',
                'errors' => $validator->errors()
            ]);
        }//success
        else {
            $car_data = [
                'en' => [
                    'name'          => $request->input('name_en'),
                    'custom_title'  => $request->input('car_custom_title_en'),
                    'description'   => $request->input('description_en'),
                    'supplier_note' => $request->input('supplier_note_en'),
                    'delivery'      => $request->input('delivery_en'),
                    'insurance'     => $request->input('insurance_en'),

                    'meta_title'            => $request->input('meta_title_en'),
                    'meta_description'      => $request->input('meta_description_en'),
                    'meta_keyword'          => $request->input('meta_keyword_en'),

                ],
                'ar' => [
                    'name'          => $request->input('name_ar'),
                    'custom_title'  => $request->input('car_custom_title_ar'),
                    'description'   => $request->input('description_ar'),
                    'supplier_note' => $request->input('supplier_note_ar'),
                    'delivery'      => $request->input('delivery_ar'),
                    'insurance'     => $request->input('insurance_ar'),
                    'faq'           => $request->input('faq_ar'),
                    //JM VPN Change
                    'meta_title'            => $request->input('meta_title_ar'),
                    'meta_description'      => $request->input('meta_description_ar'),
                    'meta_keyword'          => $request->input('meta_keyword_ar'),
                ],
                'fr' => [
                    'name'          => $request->input('name_fr'),
                    'custom_title'  => $request->input('car_custom_title_fr'),
                    'description'   => $request->input('description_fr'),
                    'supplier_note' => $request->input('supplier_note_fr'),
                    'delivery'      => $request->input('delivery_fr'),
                    'insurance'     => $request->input('insurance_fr'),
                    'faq'           => $request->input('faq_fr'),
                    //JM VPN Change
                    'meta_title'            => $request->input('meta_title_fr'),
                    'meta_description'      => $request->input('meta_description_fr'),
                    'meta_keyword'          => $request->input('meta_keyword_fr'),
                ],
                'ru' => [
                    'name'          => $request->input('name_ru'),
                    'custom_title'  => $request->input('car_custom_title_ru'),
                    'description'   => $request->input('description_ru'),
                    'supplier_note' => $request->input('supplier_note_ru'),
                    'delivery'      => $request->input('delivery_ru'),
                    'insurance'     => $request->input('insurance_ru'),
                    'faq'           => $request->input('faq_ru'),
                    //JM VPN Change
                    'meta_title'            => $request->input('meta_title_ru'),
                    'meta_description'      => $request->input('meta_description_ru'),
                    'meta_keyword'          => $request->input('meta_keyword_ru'),
                ],
                // 'slug'                  => Str::slug($request->name_en),
                'slug'                  =>$request->input('slug'),
                'car_brand_id'          => $request->input('car_brand_id'),
                'car_type_id'           => 0,
                'custom_url_slug'       => $request->input('custom_url_slug'),
                //'deal_type'             => $request->input('deal_type'),
                'car_model_year'        => $request->input('car_model_year'),
                'deposit'               => $request->input('deposit'),
                //'kms'                 => $request->input('kms'),
                'daily_mileage_limit'   => $request->input('daily_mileage_limit'),
                'weekly_mileage_limit'  => $request->input('weekly_mileage_limit'),
                'monthly_mileage_limit' => $request->input('monthly_mileage_limit'),
                'min_age'               => $request->input('min_age'),
                'daily_price'           => $request->input('daily_price'),
                'weekly_price'          => $request->input('weekly_price'),
                'monthly_price'         => $request->input('monthly_price'),
                'is_available'          => $request->input('is_available'),
                //'is_most_rented'       => $request->input('is_most_rented'),
                'status'                => $request->input('status'),
                'feature_image'          => !empty($imagename['image_en'])  ?   $imagename['image_en']  : ''//JM VPN Change
            ];
            // pr($car_data);
            $$module_name_singular = $module_model::create($car_data);


            //store car types
            if ($request->input('car_type_id')) {
                if(count($request->input('car_type_id')) > 0) {
                    foreach($request->input('car_type_id') as $car_type_id) {
                        CarHasCarType::create([
                            'car_id' => $$module_name_singular->id,
                            'car_type_id' => $car_type_id
                        ]);
                    }
                }
            }

            //upload car image
            if ($request->hasFile('images')) {
               foreach ($request->file('images') as $key=>$image) {
                    //$image = $request->file('images');
                    // $image_name = time().$key . '.' . $image->getClientOriginalExtension();
                    // $image->move(base_path('public/frontend/image'), $image_name);
                    $image_name = uploadImage("frontend/image", $image, $request->input('name_en'),null,true);
                    $car_image = CarImage::create([
                        'car_id' => $$module_name_singular->id,
                        'position' => $key + 1,
                        'image' => $image_name
                    ]);
               }
            }
//            if($request->Totalimages > 0) {
//
//                for ($x = 0; $x < $request->Totalimages; $x++) {
//
//                    if ($request->hasFile('images' . $x)) {
//                        $file = $request->file('images' . $x);
//
//                        //$path = $file->store('public/frontend/image');
//                        //$name = $file->getClientOriginalName();
//                        $image_name = time() . '.' . $image->getClientOriginalExtension();
//                        $file->move(base_path('public/frontend/image'), $image_name);
//
//                        $car_image = CarImage::create([
//                            'car_id' => $$module_name_singular->id,
//                            'image' => time() . '.' . $image_name]);
//                    }
//                }
//            }

            //store car features in english
            $feature_titles_en = $request->feature_title_en;
            $feature_icon_html = $request->feature_icon_html;
            $feature_titles_ar = $request->feature_title_ar;
            $feature_titles_fr = $request->feature_title_fr;
            $feature_titles_ru = $request->feature_title_ru;
            if (count($feature_titles_en) > 0) {
                foreach ($feature_titles_en as $index => $feature_title_en) {
                    $car_data = [
                        'en' => [
                            'feature_title' => $feature_title_en,
                        ],
                        'ar' => [
                            'feature_title' => isset($feature_titles_ar[$index]) ? $feature_titles_ar[$index] : '',
                        ],
                        'fr' => [
                            'feature_title' => isset($feature_titles_fr[$index]) ? $feature_titles_fr[$index] : '',
                        ],
                        'ru' => [
                            'feature_title' => isset($feature_titles_ru[$index]) ? $feature_titles_ru[$index] : '',
                        ],
                        'car_id' => $$module_name_singular->id,
                        'icon_html' => $feature_icon_html[$index],
                    ];
                    $car_feature = CarFeature::create($car_data);
                }
            }
            //store delivery service in EN
            $services_title_en = $request->service_title_en;
            $services_title_ar = $request->service_title_ar;
            $services_title_fr = $request->service_title_fr;
            $services_title_ru = $request->service_title_ru;
            if (count($services_title_en) > 0) {
                foreach ($services_title_en as $index => $service_title_en) {
                    $car_ser_data = [
                        'en' => [
                            'service_title' => $service_title_en,
                        ],
                        'ar' => [
                            'service_title' =>  isset($services_title_ar[$index]) ? $services_title_ar[$index] : '',
                        ],
                        'fr' => [
                            'service_title' =>  isset($services_title_fr[$index]) ? $services_title_fr[$index] : '',
                        ],
                        'ru' => [
                            'service_title' =>  isset($services_title_ru[$index]) ? $services_title_ru[$index] : '',
                        ],
                        'car_id' => $$module_name_singular->id,
                    ];
                    $car_deliverypick_service = CarDeliveryPickUpService::create($car_ser_data);
                }
            }
            //store car rent in EN
            $rents_en = $request->rent_detail_en;
            $rents_ar = $request->rent_detail_ar;
            $rents_fr = $request->rent_detail_fr;
            $rents_ru = $request->rent_detail_ru;
            if (count($rents_en) > 0) {
                foreach ($rents_en as $index => $rent_detail_en) {
                    $car_rent_data = [
                        'en' => [
                            'rent_detail_text' => $rent_detail_en,
                        ],
                        'ar' => [
                            'rent_detail_text' => isset($rents_ar[$index]) ? $rents_ar[$index] : '',
                        ],
                        'fr' => [
                            'rent_detail_text' => isset($rents_fr[$index]) ? $rents_fr[$index] : '',
                        ],
                        'ru' => [
                            'rent_detail_text' => isset($rents_ru[$index]) ? $rents_ru[$index] : '',
                        ],
                        'car_id' => $$module_name_singular->id,
                    ];
                    $car_rent_detail = CarRentDetail::create($car_rent_data);
                }
            }
            //store car specification in EN
            $specification_titles_en = $request->specification_title_en;
            $specification_icon_html = $request->specification_icon_html;
            $specification_titles_ar = $request->specification_title_ar;
            $specification_titles_fr = $request->specification_title_fr;
            $specification_titles_ru = $request->specification_title_ru;
            if (count($specification_titles_en) > 0) {
                foreach ($specification_titles_en as $index => $specification_title_en) {
                    $car_spe_data = [
                        'en' => [
                            'specification_title' => $specification_title_en,
                        ],
                        'ar' => [
                            'specification_title' => isset($specification_titles_ar[$index]) ? $specification_titles_ar[$index] : '',
                        ],
                        'fr' => [
                            'specification_title' => isset($specification_titles_fr[$index]) ? $specification_titles_fr[$index] : '',
                        ],
                        'ru' => [
                            'specification_title' => isset($specification_titles_ru[$index]) ? $specification_titles_ru[$index] : '',
                        ],
                        'car_id' => $$module_name_singular->id,
                        'icon_html' => $specification_icon_html[$index],
                    ];
                    $car_specification = CarSpecification::create($car_spe_data);
                }
            }
            //store car aditional detail in EN
            $rent_key_ens = $request->rent_key_en;
            $rent_valu_ens = $request->rent_value_en;
            $rent_key_ars = $request->rent_key_ar;
            $rent_valu_ars = $request->rent_value_ar;
            $rent_key_frs = $request->rent_key_fr;
            $rent_valu_frs = $request->rent_value_fr;
            $rent_key_rus = $request->rent_key_ru;
            $rent_valu_rus = $request->rent_value_ru;
            if (count($rent_key_ens) > 0) {
                foreach ($rent_key_ens as $index => $rent_key_en) {
                    $car_rent_in_data = [
                        'en' => [
                            'key' => $rent_key_en,
                            'value' => isset($rent_valu_ens[$index]) ? $rent_valu_ens[$index] : '',
                        ],
                        'ar' => [
                            'key' => isset($rent_key_ars[$index]) ? $rent_key_ars[$index] : '',
                            'value' => isset($rent_valu_ars[$index]) ? $rent_valu_ars[$index] : '',
                        ],
                        'fr' => [
                            'key' => isset($rent_key_frs[$index]) ? $rent_key_frs[$index] : '',
                            'value' => isset($rent_valu_frs[$index]) ? $rent_valu_frs[$index] : '',
                        ],
                        'ru' => [
                            'key' => isset($rent_key_rus[$index]) ? $rent_key_rus[$index] : '',
                            'value' => isset($rent_valu_rus[$index]) ? $rent_valu_rus[$index] : '',
                        ],
                        'car_id' => $$module_name_singular->id,
                    ];
                    $car_rent_in = CarRentalInclude::create($car_rent_in_data);
                }
            }
            //store car rental req IN EN
            $rent_req_key_ens = $request->rent_req_key_en;
            $rent_req_value_ens = $request->rent_req_value_en;
            $rent_req_key_ars = $request->rent_req_key_ar;
            $rent_req_value_ars = $request->rent_req_value_ar;
            $rent_req_key_frs = $request->rent_req_key_fr;
            $rent_req_value_frs = $request->rent_req_value_fr;
            $rent_req_key_rus = $request->rent_req_key_ru;
            $rent_req_value_rus = $request->rent_req_value_ru;
            if (count($rent_req_key_ens) > 0) {
                foreach ($rent_req_key_ens as $index => $rent_req_key_en) {
                    $car_rent_req_data = [
                        'en' => [
                            'key' => $rent_req_key_en,
                            'value' => isset($rent_req_value_ens[$index]) ? $rent_req_value_ens[$index] : '',
                        ],
                        'ar' => [
                            'key' => isset($rent_req_key_ars[$index]) ? $rent_req_key_ars[$index] : '',
                            'value' => isset($rent_req_value_ars[$index]) ? $rent_req_value_ars[$index] : '',
                        ],
                        'fr' => [
                            'key' => isset($rent_req_key_frs[$index]) ? $rent_req_key_frs[$index] : '',
                            'value' => isset($rent_req_value_frs[$index]) ? $rent_req_value_frs[$index] : '',
                        ],
                        'ru' => [
                            'key' => isset($rent_req_key_rus[$index]) ? $rent_req_key_rus[$index] : '',
                            'value' => isset($rent_req_value_rus[$index]) ? $rent_req_value_rus[$index] : '',
                        ],
                        'car_id' => $$module_name_singular->id,
                    ];
                    $car_rent_req = CarRentalRequirement::create($car_rent_req_data);
                }
            }

            flash("<i class='fas fa-check'></i>  " . Str::singular($module_title) . __('common.add_data'))->success()->important();

            Log::info(label_case($module_title . ' ' . $module_action) . " | '" . $$module_name_singular->name . '(ID:' . $$module_name_singular->id . ") ' by User:" . Auth::user()->name . '(ID:' . Auth::user()->id . ')');

            return response()->json([
                'status' => 1,
                'message' => "<i class='fas fa-check'></i> " . Str::singular($module_title) . __('common.add_data'),
                'data' => [
                    'redirect' => url("admin/$module_name")
                ]
            ]);
        }
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
        $module_title = __('car.cars');

        $$module_name_singular = $module_model::findOrFail($id);
        Log::info(label_case($module_title.' '.$module_action)." | '".$$module_name_singular->name.'(ID:'.$$module_name_singular->id.") ' by User:".auth()->user()->name.'(ID:'.auth()->user()->id.')');

        $car_brands = CarBrand::active()->get();
        $car_types = CarType::active()->get();

        $faq = Faq::leftjoin('cars', 'faqs.reference_id','=','cars.id')
        ->leftjoin('faq_qa_details','faqs.id','=','faq_qa_details.faq_id')
        ->leftjoin('faq_qa_detail_translations','faq_qa_details.id','=','faq_qa_detail_translations.faq_qa_detail_id')
        ->select('faqs.*','faq_qa_detail_translations.*')->where('cars.id',$id)->where('type','car')
        ->get();


        $faq_en =$faq->where('locale','en');
        $faq_ar =$faq->where('locale','ar');
        $faq_fr =$faq->where('locale','fr');
        $faq_ru =$faq->where('locale','ru');
        // dd($faq_ru);

        return view(
            "car::backend.$module_name.edit",
            compact('module_title', 'module_name', 'module_icon', 'module_path', 'module_name_singular', 'module_action', "$module_name_singular", 'car_brands', 'car_types','faq_en','faq_ar','faq_fr','faq_ru')
        );
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
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
        $module_title = __('car.cars');

        $validator = Validator::make($request->all(), [
            'name_en'               => 'required|max:255',
            'name_ar'               => 'required|max:255',
            'name_fr'               => 'required|max:255',
            'name_ru'               => 'required|max:255',

            'car_custom_title_en'   => 'required|max:255',
            'car_custom_title_ar'   => 'required|max:255',
            'car_custom_title_fr'   => 'required|max:255',
            'car_custom_title_ru'   => 'required|max:255',

            'delivery_en'           => 'required|max:255',
            'delivery_ar'           => 'required|max:255',
            'delivery_fr'           => 'required|max:255',
            'delivery_ru'           => 'required|max:255',

            'insurance_en'          => 'required|max:255',
            'insurance_ar'          => 'required|max:255',
            'insurance_fr'          => 'required|max:255',
            'insurance_ru'          => 'required|max:255',

            'car_brand_id'          =>'required',
            'car_type_id'           =>'required',
           // 'deal_type'             =>'required|in:Daily,Weekly,Monthly',
            'car_model_year'        =>'required|numeric|digits:4',
            'deposit'               =>'required|numeric',
            //'kms'                 =>'required|numeric',
            'daily_mileage_limit'   =>'required|numeric',
            'weekly_mileage_limit'  =>'required|numeric',
            'monthly_mileage_limit' =>'required|numeric',
            'min_age'               =>'required|numeric|digits:2',
            'daily_price'           =>'required|numeric',
            'weekly_price'          =>'required|numeric',
            'monthly_price'         =>'required|numeric',
            'is_available'          =>'required|in:yes,no',
            'slug'                  =>'required|max:255|unique:cars,slug,'.$id,
            'custom_url_slug'       => 'required|max:255',
            //'is_most_rented'      =>'required|in:yes,no',
            'images.*'              =>'required',

            'feature_icon_html.*'   => 'required',
            'specification_icon_html.*'    => 'required',

            'feature_title_en.*'    => 'required|max:255',
            'feature_title_ar.*'    => 'required|max:255',
            'feature_title_fr.*'    => 'required|max:255',
            'feature_title_ru.*'    => 'required|max:255',

            'service_title_en.*'    => 'required|max:255',
            'service_title_ar.*'    => 'required|max:255',
            'service_title_fr.*'    => 'required|max:255',
            'service_title_ru.*'    => 'required|max:255',

            'rent_detail_en.*'      => 'required|max:255',
            'rent_detail_ar.*'      => 'required|max:255',
            'rent_detail_fr.*'      => 'required|max:255',
            'rent_detail_ru.*'      => 'required|max:255',

            'specification_title_en.*' => 'required|max:255',
            'specification_title_ar.*' => 'required|max:255',
            'specification_title_fr.*' => 'required|max:255',
            'specification_title_ru.*' => 'required|max:255',

            'key_en.*'              => 'required|max:255',
            'value_en.*'            => 'required|max:255',
            'key_ar.*'              => 'required|max:255',
            'value_ar.*'            => 'required|max:255',
            'key_fr.*'              => 'required|max:255',
            'value_fr.*'            => 'required|max:255',
            'key_ru.*'              => 'required|max:255',
            'value_ru.*'            => 'required|max:255',

            'rent_key_en.*'         => 'required|max:255',
            'rent_value_en.*'       => 'required|max:255',
            'rent_key_ar.*'         => 'required|max:255',
            'rent_value_ar.*'       => 'required|max:255',
            'rent_key_fr.*'         => 'required|max:255',
            'rent_value_fr.*'       => 'required|max:255',
            'rent_key_ru*'         => 'required|max:255',
            'rent_value_ru.*'       => 'required|max:255',

            'rent_req_key_en.*'     => 'required|max:255',
            'rent_req_value_en.*'   => 'required|max:255',
            'rent_req_key_ar.*'     => 'required|max:255',
            'rent_req_value_ar.*'   => 'required|max:255',
            'rent_req_key_fr.*'     => 'required|max:255',
            'rent_req_value_fr.*'   => 'required|max:255',
            'rent_req_key_ru.*'     => 'required|max:255',
            'rent_req_value_ru.*'   => 'required|max:255',
        ], [
            'images.*.required' => __('car.images_re'),
            'images.*.mimes'    => __('car.image_mimes'),
            'images.*.max'      => __('car.iamge_max'),

            'feature_title_en.*'=> __('car.feature_title_en_v'),
            'feature_title_ar.*'=> __('car.feature_title_ar_v'),
            'feature_title_fr.*'=> __('car.feature_title_fr_v'),
            'feature_title_ru.*'=> __('car.feature_title_ru_v'),

            'service_title_en.*'=> __('car.service_title_en_v'),
            'service_title_ar.*'=> __('car.service_title_ar_v'),
            'service_title_fr.*'=> __('car.service_title_fr_v'),
            'service_title_ru.*'=> __('car.service_title_ru_v'),

            'rent_detail_en.*'  => __('car.rent_detail_en_v'),
            'rent_detail_ar.*'  => __('car.rent_detail_ar_v'),
            'rent_detail_fr.*'  => __('car.rent_detail_fr_v'),
            'rent_detail_ru.*'  => __('car.rent_detail_ru_v'),

            'specification_title_en.*' => __('car.specification_title_en_v'),
            'specification_title_ar.*' => __('car.specification_title_ar_v'),
            'specification_title_fr.*' => __('car.specification_title_fr_v'),
            'specification_title_ru.*' => __('car.specification_title_ru_v'),

            'key_en.*'           => __('car.key_en_v'),
            'value_en.*'        => __('car.value_en_v'),
            'key_ar.*'           => __('car.key_ar_v'),
            'value_ar.*'        => __('car.value_ar_v'),
            'key_fr.*'           => __('car.kekey_fr_v'),
            'value_fr.*'        => __('car.value_fr_v'),
            'key_ru.*'           => __('car.key_ru_v'),
            'value_ru.*'        => __('car.value_ru_v'),

            'rent_key_en.*'     => __('car.rent_key_en_v'),
            'rent_value_en.*'   => __('car.rent_value_en_v'),
            'rent_key_ar.*'     => __('car.rent_key_ar_v'),
            'rent_value_ar.*'   => __('car.rent_value_ar_v'),
            'rent_key_fr.*'     => __('car.rent_kekey_fr_v'),
            'rent_value_fr.*'   => __('car.rent_value_fr_v'),
            'rent_key_ru.*'     => __('car.rent_key_ru_v'),
            'rent_value_ru.*'   => __('car.rent_value_ru_v'),

            'rent_req_key_en.*' => __('car.rent_req_key_en_v'),
            'rent_req_value_en.*'=> __('car.rent_req_value_en_v'),
            'rent_req_key_ar.*' =>__('car.rent_req_key_ar_v'),
            'rent_req_value_ar.*'=> __('car.rent_req_value_ar_v'),
            'rent_req_key_fr.*' => __('car.rent_req_kekey_fr_v'),
            'rent_req_value_fr.*'=> __('car.rent_req_value_fr_v'),
            'rent_req_key_ru.*' => __('car.rent_req_key_ru_v'),
            'rent_req_value_ru.*'=> __('car.rent_req_value_ru_v'),
        ]);
        //error come
        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'message' => '',
                'errors' => $validator->errors()
            ]);
        }//success
        else {
            $$module_name_singular = $module_model::findOrFail($id);
            //JM VPN Change
            //feature image code
            $imagename= feature_image('Car',$request->input("name_en"), $$module_name_singular->feature_image);

            $car_data = [
                'en' => [
                    'name'          => $request->input('name_en'),
                    'custom_title'  => $request->input('car_custom_title_en'),
                    'description'   => $request->input('description_en'),
                    'supplier_note' => $request->input('supplier_note_en'),
                    'delivery'      => $request->input('delivery_en'),
                    'insurance'     => $request->input('insurance_en'),

                    'meta_title'            => $request->input('meta_title_en'),
                    'meta_description'      => $request->input('meta_description_en'),
                    'meta_keyword'          => $request->input('meta_keyword_en'),
                ],
                'ar' => [
                    'name'          => $request->input('name_ar'),
                    'custom_title'  => $request->input('car_custom_title_ar'),
                    'description'   => $request->input('description_ar'),
                    'supplier_note' => $request->input('supplier_note_ar'),
                    'delivery'      => $request->input('delivery_ar'),
                    'insurance'     => $request->input('insurance_ar'),

                    'meta_title'            => $request->input('meta_title_ar'),
                    'meta_description'      => $request->input('meta_description_ar'),
                    'meta_keyword'          => $request->input('meta_keyword_ar'),
                ],
                'fr' => [
                    'name'          => $request->input('name_fr'),
                    'custom_title'  => $request->input('car_custom_title_fr'),
                    'description'   => $request->input('description_fr'),
                    'supplier_note' => $request->input('supplier_note_fr'),
                    'delivery'      => $request->input('delivery_fr'),
                    'insurance'     => $request->input('insurance_fr'),

                    'meta_title'            => $request->input('meta_title_fr'),
                    'meta_description'      => $request->input('meta_description_fr'),
                    'meta_keyword'          => $request->input('meta_keyword_fr'),
                ],
                'ru' => [
                    'name'          => $request->input('name_ru'),
                    'custom_title'  => $request->input('car_custom_title_ru'),
                    'description'   => $request->input('description_ru'),
                    'supplier_note' => $request->input('supplier_note_ru'),
                    'delivery'      => $request->input('delivery_ru'),
                    'insurance'     => $request->input('insurance_ru'),


                    'meta_title'            => $request->input('meta_title_ru'),
                    'meta_description'      => $request->input('meta_description_ru'),
                    'meta_keyword'          => $request->input('meta_keyword_ru'),
                ],
                'car_brand_id'          => $request->input('car_brand_id'),
                'car_type_id'           => 0,
                'slug'                  =>$request->input('slug'),
                'custom_url_slug'       => $request->input('custom_url_slug'),
                //'deal_type'             => $request->input('deal_type'),
                'car_model_year'        => $request->input('car_model_year'),
                'deposit'               => $request->input('deposit'),
                //'kms'                 => $request->input('kms'),
                'daily_mileage_limit'   => $request->input('daily_mileage_limit'),
                'weekly_mileage_limit'  => $request->input('weekly_mileage_limit'),
                'monthly_mileage_limit' => $request->input('monthly_mileage_limit'),
                'min_age'               => $request->input('min_age'),
                'daily_price'           => $request->input('daily_price'),
                'weekly_price'          => $request->input('weekly_price'),
                'is_available'          => $request->input('is_available'),
                'monthly_price'         => $request->input('monthly_price'),
                //'is_most_rented'      => $request->input('is_most_rented'),
                'status'                => $request->input('status'),
                'feature_image'         =>  !empty($imagename['image_en'])  ?   $imagename['image_en']  : $$module_name_singular->feature_image //JM VPN Change
            ];


            //delete car types
            if(count($$module_name_singular->car_has_car_types) > 0) {
                $$module_name_singular->car_has_car_types()->delete();
            }
            //update car types
            if ($request->input('car_type_id')) {
                if(count($request->input('car_type_id')) > 0) {
                    foreach($request->input('car_type_id') as $car_type_id) {
                        CarHasCarType::create([
                            'car_id' => $$module_name_singular->id,
                            'car_type_id' => $car_type_id
                        ]);
                    }
                }
            }
            //delete car image
            $delete_car_images  = $request->delete_car_images;
            $delete_car_images_arr = explode(',',$delete_car_images);
            if($request->delete_car_images != NULL) {
                foreach ($delete_car_images_arr as $delete_car_image) {
                    $car_image = CarImage::find($delete_car_image);
                    if($car_image){
                        $file_path= public_path('frontend/image/'.$car_image->image);
                        if(File::exists($file_path)){
                            File::delete($file_path);
                        }
                        $car_image->delete();
                    }
                }
            }
            //reorder image
           // if ($request->hasFile('images') == '') {
                if (!empty($request->image_reoder)) {
                    $image_reorder_arr = explode(',', $request->image_reoder);
                    if (count($image_reorder_arr) > 0) {
                        foreach ($image_reorder_arr as $index => $image_id) {
                            $car_image = CarImage::find($image_id);
                            if (!empty($car_image)) {
                                $position = $index + 1;
                                $car_image->update([
                                    'position' => $position
                                ]);
                            }
                        }
                    }
                }
           // }
            //update car image
            if ($request->hasFile('images')) {
                $max_position = (count(CarImage::where('car_id', $$module_name_singular->id)->get()) > 0) ? CarImage::where('car_id', $$module_name_singular->id)->max('position') : 0;
                foreach($request->file('images') as $key=>$image) {
                    // $image_name = time().$key.'.'.$image->getClientOriginalExtension();
                    // $image->move( base_path('public/frontend/image'), $image_name);
                    $image_name = uploadImage("frontend/image", $image, $request->input('name_en'),null,true);
                    $car_image = CarImage::create([
                        'car_id' => $$module_name_singular->id,
                        'image' => $image_name,
                        'position' => $max_position + 1
                    ]);
                }
            }
            // if ($request->hasFile('images')) {
            //     // foreach ($request->file('images') as $image) {
            //     $image = $request->file('images');
            //     $image_name = time() . '.' . $image->getClientOriginalExtension();
            //     $image->move(base_path('public/frontend/image'), $image_name);
            //     $car_image = CarImage::create([
            //         'car_id' => $$module_name_singular->id,
            //         'image' => $image_name]);
            //     // }
            // }
            //delete car features
            $delete_car_feature_id  = $request->delete_car_feature_id;
            $delete_car_feature_arr = explode(',',$delete_car_feature_id);
            if($request->delete_car_feature_id != NULL) {
                foreach ($delete_car_feature_arr as $delete_car_feature) {
                    $car_feature = CarFeature::find($delete_car_feature);
                    $car_feature_trans = CarFeatureTranslation::where('car_feature_id', $delete_car_feature)->first();
                    if(!empty($car_feature_trans)) {
                        $car_feature_trans->delete();
                    }
                    $car_feature->delete();
                }
            }
            //update car features in EN
            $feature_titles_en = $request->feature_title_en;
            $car_feature_id_en = $request->car_feature_id_en;
            $feature_titles_ar = $request->feature_title_ar;
            $feature_titles_fr = $request->feature_title_fr;
            $feature_titles_ru = $request->feature_title_ru;
            $feature_icon_html = $request->feature_icon_html;
            $car_feature_id_en = $request->car_feature_id_en;
            if(count($feature_titles_en) > 0) {
                foreach ($feature_titles_en as $index => $feature_title_en) {
                    if(isset( $car_feature_id_en[$index]) && $car_feature_id_en[$index] != NULL) {
                        $car_feature = CarFeature::find($car_feature_id_en[$index]);
                        $car_fe_data = [
                            'en' => [
                                'feature_title'      => $feature_title_en,
                            ],
                            'car_id' => $$module_name_singular->id,
                            'icon_html' => $feature_icon_html[$index],
                        ];
                        $car_feature->update($car_fe_data);
                    }
                    else {
                        $car_data = [
                            'en' => [
                                'feature_title' => $feature_title_en,
                            ],
                            'ar' => [
                                'feature_title' => isset($feature_titles_ar[$index]) ? $feature_titles_ar[$index] : '' ,
                            ],
                            'fr' => [
                                'feature_title'      => isset($feature_titles_fr[$index]) ? $feature_titles_fr[$index] : '' ,
                            ],
                            'ru' => [
                                'feature_title' => isset($feature_titles_ru[$index]) ? $feature_titles_ru[$index] : '' ,
                            ],
                            'car_id' => $$module_name_singular->id,
                            'icon_html' => $feature_icon_html[$index],
                        ];
                        if(!empty($car_feature)) {
                            $car_feature = CarFeature::create($car_data);
                        }
                    }
                }
            }
            //update car features in AR
            $car_feature_id_ar = $request->car_feature_id_ar;
            if(count($feature_titles_ar) > 0) {
                foreach ($feature_titles_ar as $index => $feature_title_ar) {
                    if(isset( $car_feature_id_ar[$index]) && $car_feature_id_ar[$index] != NULL) {
                        $car_feature = CarFeature::find($car_feature_id_ar[$index]);
                        $car_fe_data = [
                            'ar' => [
                                'feature_title'      => $feature_title_ar,
                            ],
                            'car_id' => $$module_name_singular->id,
                            'icon_html' => isset($feature_icon_html[$index]) ? $feature_icon_html[$index] : '',
                        ];
                        if(!empty($car_feature)) {
                            $car_feature->update($car_fe_data);
                        }
                    }
                }
            }
            //update car features in FR
            $car_feature_id_fr = $request->car_feature_id_fr;
            if(count($feature_titles_fr) > 0) {
                foreach ($feature_titles_fr as $index => $feature_title_fr) {
                    if(isset( $car_feature_id_fr[$index]) && $car_feature_id_fr[$index] != NULL) {
                        $car_feature = CarFeature::find($car_feature_id_fr[$index]);
                        $car_fe_data = [
                            'fr' => [
                                'feature_title'      => $feature_title_fr,
                            ],
                            'car_id' => $$module_name_singular->id,
                            'icon_html' => isset($feature_icon_html[$index]) ? $feature_icon_html[$index] : '',
                        ];
                        if(!empty($car_feature)) {
                            $car_feature->update($car_fe_data);
                        }
                    }
                }
            }
            //update car features in RU
            $car_feature_id_ru = $request->car_feature_id_ru;
            if(count($feature_titles_ru) > 0) {
                foreach ($feature_titles_ru as $index => $feature_title_ru) {
                    if(isset( $car_feature_id_ru[$index]) && $car_feature_id_ru[$index] != NULL) {
                        $car_feature = CarFeature::find($car_feature_id_ru[$index]);
                        $car_fe_data = [
                            'ru' => [
                                'feature_title'      => $feature_title_ru,
                            ],
                            'car_id' => $$module_name_singular->id,
                            'icon_html' => isset($feature_icon_html[$index]) ? $feature_icon_html[$index] : '',
                        ];
                        if(!empty($car_feature)) {
                            $car_feature->update($car_fe_data);
                        }
                    }
                }
            }
            //delete delivery pick up service
            $delete_car_delivery_pick_up_service_id  = $request->delete_car_delivery_pick_up_service_id;
            $delete_car_delivery_pick_up_service_arr = explode(',',$delete_car_delivery_pick_up_service_id);
            if($request->delete_car_delivery_pick_up_service_id != NULL) {
                foreach ($delete_car_delivery_pick_up_service_arr as $delete_car_delivery_pick_up_service) {
                    $car_delivery_pick_up_service = CarDeliveryPickUpService::find($delete_car_delivery_pick_up_service);
                    $car_delivery_pick_up_trans = CarDeliveryPickUpServiceTranslation::where('car_delivery_pick_up_service_id', $delete_car_delivery_pick_up_service)->first();
                    if(!empty($car_delivery_pick_up_trans)) {
                        $car_delivery_pick_up_trans->delete();
                    }
                    $car_delivery_pick_up_service->delete();
                }
            }
            //update delivery service in EN
            $services_title_en = $request->service_title_en;
            $car_delivery_pick_up_service_id_en = $request->car_delivery_pick_up_service_id_en;
            $services_title_ar = $request->service_title_ar;
            $services_title_fr = $request->service_title_fr;
            $services_title_ru = $request->service_title_ru;
            if(count($services_title_en) > 0) {
                foreach ($services_title_en as $index => $service_title_en) {
                    if(isset( $car_delivery_pick_up_service_id_en[$index]) && $car_delivery_pick_up_service_id_en[$index] != NULL) {
                        $car_deliverypick_service = CarDeliveryPickUpService::find($car_delivery_pick_up_service_id_en[$index]);
                        $car_ser_data = [
                            'en' => [
                                'service_title' => $service_title_en,
                            ],
                            'car_id' => $$module_name_singular->id,
                        ];
                        if(!empty($car_deliverypick_service)) {
                            $car_deliverypick_service->update($car_ser_data);
                        }
                    }
                    else {
                        $car_ser_data = [
                            'en' => [
                                'service_title' => $service_title_en,
                            ],
                            'ar' => [
                                'service_title' => isset($services_title_ar[$index]) ? $services_title_ar[$index] : '' ,
                            ],
                            'fr' => [
                                'service_title' => isset($services_title_fr[$index]) ? $services_title_fr[$index] : '' ,
                            ],
                            'ru' => [
                                'service_title' => isset($services_title_ru[$index]) ? $services_title_ru[$index] : '' ,
                            ],
                            'car_id' => $$module_name_singular->id,
                        ];
                        $car_deliverypick_service = CarDeliveryPickUpService::create($car_ser_data);
                    }
                }
            }
            //update delivery service in AR
            $car_delivery_pick_up_service_id_ar = $request->car_delivery_pick_up_service_id_ar;
            if(count($services_title_ar) > 0) {
                foreach ($services_title_ar as $index => $service_title_ar) {
                    if(isset( $car_delivery_pick_up_service_id_ar[$index]) && $car_delivery_pick_up_service_id_ar[$index] != NULL) {
                        $car_deliverypick_service = CarDeliveryPickUpService::find($car_delivery_pick_up_service_id_ar[$index]);
                        $car_ser_data = [
                            'ar' => [
                                'service_title' => $service_title_ar,
                            ],
                            'car_id' => $$module_name_singular->id,
                        ];
                        if(!empty($car_deliverypick_service)) {
                            $car_deliverypick_service->update($car_ser_data);
                        }
                    }
                }
            }
            //update delivery service in FR
            $car_delivery_pick_up_service_id_fr = $request->car_delivery_pick_up_service_id_fr;
            if(count($services_title_fr) > 0) {
                foreach ($services_title_fr as $index => $service_title_fr) {
                    if(isset( $car_delivery_pick_up_service_id_fr[$index]) && $car_delivery_pick_up_service_id_fr[$index] != NULL) {
                        $car_deliverypick_service = CarDeliveryPickUpService::find($car_delivery_pick_up_service_id_fr[$index]);
                        $car_ser_data = [
                            'fr' => [
                                'service_title' => $service_title_fr,
                            ],
                            'car_id' => $$module_name_singular->id,
                        ];
                        if(!empty($car_deliverypick_service)) {
                            $car_deliverypick_service->update($car_ser_data);
                        }
                    }
                }
            }
            //update delivery service in RU
            $car_delivery_pick_up_service_id_ru = $request->car_delivery_pick_up_service_id_ru;
            if(count($services_title_ru) > 0) {
                foreach ($services_title_ru as $index => $service_title_ru) {
                    if(isset( $car_delivery_pick_up_service_id_ru[$index]) && $car_delivery_pick_up_service_id_ru[$index] != NULL) {
                        $car_deliverypick_service = CarDeliveryPickUpService::find($car_delivery_pick_up_service_id_ru[$index]);
                        $car_ser_data = [
                            'ru' => [
                                'service_title' => $service_title_ru,
                            ],
                            'car_id' => $$module_name_singular->id,
                        ];
                        if(!empty($car_deliverypick_service)) {
                            $car_deliverypick_service->update($car_ser_data);
                        }
                    }
                }
            }
            //delete car rxent
            $delete_car_rent_detail_id  = $request->delete_car_rent_detail_id;
            $delete_car_rent_detail_arr = explode(',',$delete_car_rent_detail_id);
            if($request->delete_car_rent_detail_id != NULL) {
                foreach ($delete_car_rent_detail_arr as $delete_car_rent_detail) {
                    $car_rent_detail = CarRentDetail::find($delete_car_rent_detail);
                    $car_rent_detail_trans = CarRentDetailTranslation::where('car_rent_detail_id', $delete_car_rent_detail)->first();
                    if(!empty($car_rent_detail_trans)) {
                        $car_rent_detail_trans->delete();
                    }
                    $car_rent_detail->delete();
                }
            }
            //update car rxent in EN
            $rents_en = $request->rent_detail_en;
            $rents_ar = $request->rent_detail_ar;
            $rents_fr = $request->rent_detail_fr;
            $rents_ru = $request->rent_detail_ru;
            $car_rent_detail_id_en= $request->car_rent_detail_id_en;
            if(count($rents_en) > 0) {
                foreach ($rents_en as $index => $rent_detail_en) {
                    if(isset( $car_rent_detail_id_en[$index]) && $car_rent_detail_id_en[$index] != NULL) {
                        $car_rent_data = [
                            'en' => [
                                'rent_detail_text' => $rent_detail_en,
                            ],
                            'car_id' => $$module_name_singular->id,
                        ];
                        $car_rent_detail = CarRentDetail::find($car_rent_detail_id_en[$index]);
                        if(!empty($car_rent_detail)) {
                            $car_rent_detail->update($car_rent_data);
                        }
                    }
                    else {
                        $car_rent_data = [
                            'en' => [
                                'rent_detail_text' => $rent_detail_en,
                            ],
                            'ar' => [
                                'rent_detail_text' => isset($rents_ar[$index]) ? $rents_ar[$index] : '' ,
                            ],
                            'fr' => [
                                'rent_detail_text' => isset($rents_fr[$index]) ? $rents_fr[$index] : '' ,
                            ],
                            'ru' => [
                                'rent_detail_text' => isset($rents_ru[$index]) ? $rents_ru[$index] : '' ,
                            ],
                            'car_id' => $$module_name_singular->id,
                        ];
                        $car_rent_detail = CarRentDetail::create($car_rent_data);
                    }
                }
            }
            //update car rxent in AR
            $car_rent_detail_id_ar= $request->car_rent_detail_id_ar;
            if(count($rents_ar) > 0) {
                foreach ($rents_ar as $index => $rent_detail_ar) {
                    if(isset( $car_rent_detail_id_ar[$index]) && $car_rent_detail_id_ar[$index] != NULL) {
                        $car_rent_data = [
                            'ar' => [
                                'rent_detail_text' => $rent_detail_ar,
                            ],
                            'car_id' => $$module_name_singular->id,
                        ];
                        $car_rent_detail = CarRentDetail::find($car_rent_detail_id_ar[$index]);
                        if(!empty($car_rent_detail)) {
                            $car_rent_detail->update($car_rent_data);
                        }
                    }
                }
            }
            //update car rxent in FR
            $car_rent_detail_id_fr= $request->car_rent_detail_id_fr;
            if(count($rents_fr) > 0) {
                foreach ($rents_fr as $index => $rent_detail_fr) {
                    if(isset( $car_rent_detail_id_fr[$index]) && $car_rent_detail_id_fr[$index] != NULL) {
                        $car_rent_data = [
                            'fr' => [
                                'rent_detail_text' => $rent_detail_fr,
                            ],
                            'car_id' => $$module_name_singular->id,
                        ];
                        $car_rent_detail = CarRentDetail::find($car_rent_detail_id_fr[$index]);
                        if(!empty($car_rent_detail)) {
                            $car_rent_detail->update($car_rent_data);
                        }
                    }
                }
            }
            //update car rxent in RU
            $car_rent_detail_id_ru= $request->car_rent_detail_id_ru;
            if(count($rents_ru) > 0) {
                foreach ($rents_ru as $index => $rent_detail_ru) {
                    if(isset( $car_rent_detail_id_ru[$index]) && $car_rent_detail_id_ru[$index] != NULL) {
                        $car_rent_data = [
                            'ru' => [
                                'rent_detail_text' => $rent_detail_ru,
                            ],
                            'car_id' => $$module_name_singular->id,
                        ];
                        $car_rent_detail = CarRentDetail::find($car_rent_detail_id_ru[$index]);
                        if(!empty($car_rent_detail)) {
                            $car_rent_detail->update($car_rent_data);
                        }
                    }
                }
            }


            //delete car specification
            $delete_car_specification_id  = $request->delete_car_specification_id;
            $delete_car_specification_arr = explode(',',$delete_car_specification_id);
            if($request->delete_car_specification_id != NULL) {
                foreach ($delete_car_specification_arr as $delete_car_specification) {
                    $car_specification = CarSpecification::find($delete_car_specification);
                    $car_specification_trans = CarSpecificationTranslation::where('car_specification_id', $delete_car_specification)->first();
                    if(!empty($car_specification_trans)) {
                        $car_specification_trans->delete();
                    }
                    $car_specification->delete();
                }
            }

            //update car specification in EN
            $specification_title_en = $request->specification_title_en;
            $car_specification_id_en= $request->car_specification_id_en;
            $specification_title_ar = $request->specification_title_ar;
            $specification_title_fr = $request->specification_title_fr;
            $specification_title_ru = $request->specification_title_ru;
            $specification_icon_html = $request->specification_icon_html;
            if(count($specification_title_en) > 0) {
                foreach ($specification_title_en as $index => $specification_title_en_en) {
                    if(isset( $car_specification_id_en[$index]) && $car_specification_id_en[$index] != NULL) {
                        $car_spe_data = [
                            'en' => [
                                'specification_title'      => $specification_title_en_en,
                            ],
                            'car_id' => $$module_name_singular->id,
                            'icon_html' => $specification_icon_html[$index],
                        ];
                        $car_specification = CarSpecification::find($car_specification_id_en[$index]);
                        if(!empty($car_specification)) {
                            $car_specification->update($car_spe_data);
                        }
                    }
                    else {
                        $car_spe_data = [
                            'en' => [
                                'specification_title'      => $specification_title_en_en,
                            ],
                            'ar' => [
                                'specification_title'      => isset($specification_title_ar[$index]) ? $specification_title_ar[$index] : '' ,
                            ],
                            'fr' => [
                                'specification_title'      => isset($specification_title_fr[$index]) ? $specification_title_fr[$index] : '' ,
                            ],
                            'ru' => [
                                'specification_title'      => isset($specification_title_ru[$index]) ? $specification_title_ru[$index] : '' ,
                            ],
                            'car_id' => $$module_name_singular->id,
                            'icon_html' => $specification_icon_html[$index],
                        ];
                        $car_specification = CarSpecification::create($car_spe_data);
                    }
                }
            }
            //update car specification in AR
            $car_specification_id_ar= $request->car_specification_id_ar;
            if(count($specification_title_ar) > 0) {
                foreach ($specification_title_ar as $index => $specification_title_ar) {
                    if(isset( $car_specification_id_ar[$index]) && $car_specification_id_ar[$index] != NULL) {
                        $car_spe_data = [
                            'ar' => [
                                'specification_title'      => $specification_title_ar,
                            ],
                            'car_id' => $$module_name_singular->id,
                            'icon_html' => isset($specification_icon_html[$index]) ? $specification_icon_html[$index] : '',
                        ];
                        $car_specification = CarSpecification::find($car_specification_id_ar[$index]);
                        if(!empty($car_specification)) {
                            $car_specification->update($car_spe_data);
                        }
                    }
                }
            }
            //update car specification in FR
            $car_specification_id_fr= $request->car_specification_id_fr;
            if(count($specification_title_fr) > 0) {
                foreach ($specification_title_fr as $index => $specification_title_fr) {
                    if(isset( $car_specification_id_fr[$index]) && $car_specification_id_fr[$index] != NULL) {
                        $car_spe_data = [
                            'fr' => [
                                'specification_title'      => $specification_title_fr,
                            ],
                            'car_id' => $$module_name_singular->id,
                            'icon_html' => isset($specification_icon_html[$index]) ? $specification_icon_html[$index] : '',
                        ];
                        $car_specification = CarSpecification::find($car_specification_id_fr[$index]);
                        if(!empty($car_specification)) {
                            $car_specification->update($car_spe_data);
                        }
                    }
                }
            }
            //update car specification in RU
            $car_specification_id_ru= $request->car_specification_id_ru;
            if(count($specification_title_ru) > 0) {
                foreach ($specification_title_ru as $index => $specification_title_ru) {
                    if(isset( $car_specification_id_ru[$index]) && $car_specification_id_ru[$index] != NULL) {
                        $car_spe_data = [
                            'ru' => [
                                'specification_title'      => $specification_title_ru
                            ],
                            'car_id' => $$module_name_singular->id,
                            'icon_html' => isset($specification_icon_html[$index]) ? $specification_icon_html[$index] : '',
                        ];
                        $car_specification = CarSpecification::find($car_specification_id_ru[$index]);
                        if(!empty($car_specification)) {
                            $car_specification->update($car_spe_data);
                        }
                    }
                }
            }

            //delete car aditional detail
            $delete_car_rental_include_id  = $request->delete_car_rental_include_id;
            $delete_car_rental_include_arr = explode(',',$delete_car_rental_include_id);
            if($request->delete_car_rental_include_id != NULL) {
                foreach ($delete_car_rental_include_arr as $delete_car_rental_include) {
                    $car_rental_include = CarRentalInclude::find($delete_car_rental_include);
                    $car_rental_include_trans = CarRentalIncludeTranslation::where('car_rental_include_id', $delete_car_rental_include)->first();
                    if(!empty($car_rental_include_trans)) {
                        $car_rental_include_trans->delete();
                    }
                    $car_rental_include->delete();
                }
            }

            //update car aditional detail in EN
            $rent_key_ens = $request->rent_key_en;
            $rent_valu_ens = $request->rent_value_en;
            $rent_key_ars = $request->rent_key_ar;
            $rent_valu_ars = $request->rent_value_ar;
            $rent_key_frs = $request->rent_key_fr;
            $rent_valu_frs = $request->rent_value_fr;
            $rent_key_rus = $request->rent_key_ru;
            $rent_valu_rus = $request->rent_value_ru;
            $car_rental_include_id_en= $request->car_rental_include_id_en;
            if(count($rent_key_ens) > 0) {
                foreach ($rent_key_ens as $index =>$rent_key_en) {
                    if(isset( $car_rental_include_id_en[$index]) && $car_rental_include_id_en[$index] != NULL) {
                        $car_rent_in_data = [
                            'en' => [
                                'key' => $rent_key_en,
                                'value' => $rent_valu_ens[$index],
                            ],
                            'car_id' => $$module_name_singular->id,
                        ];
                        $car_rent_in = CarRentalInclude::find($car_rental_include_id_en[$index]);
                        if (!empty($car_rent_in)) {
                            $car_rent_in->update($car_rent_in_data);
                        }
                    }
                    else {
                        $car_rent_in_data = [
                            'en' => [
                                'key'       => $rent_key_en,
                                'value'      => $rent_valu_ens[$index],
                            ],
                            'ar' => [
                                'key'       => isset($rent_key_ars[$index]) ? $rent_key_ars[$index] : '' ,
                                'value'      => isset($rent_valu_ars[$index]) ? $rent_valu_ars[$index] : '' ,
                            ],
                            'fr' => [
                                'key'       =>isset($rent_key_frs[$index]) ? $rent_key_frs[$index] : '' ,
                                'value'      => isset($rent_valu_frs[$index]) ? $rent_valu_frs[$index] : '' ,
                            ],
                            'ru' => [
                                'key'       => isset($rent_key_rus[$index]) ? $rent_key_rus[$index] : '' ,
                                'value'      => isset($rent_valu_rus[$index]) ? $rent_valu_rus[$index] : '' ,
                            ],
                            'car_id' => $$module_name_singular->id,
                        ];
                        $car_rent_in = CarRentalInclude::create($car_rent_in_data);
                    }
                }
            }
            //update car aditional detail in AR
            $car_rental_include_id_ar= $request->car_rental_include_id_ar;
            if(count($rent_key_ars) > 0) {
                foreach ($rent_key_ars as $index =>$rent_key_ar) {
                    if(isset( $car_rental_include_id_ar[$index]) && $car_rental_include_id_ar[$index] != NULL) {
                        $car_rent_in_data = [
                            'ar' => [
                                'key'       => $rent_key_ar,
                                'value'      => $rent_valu_ars[$index],
                            ],
                            'car_id' => $$module_name_singular->id,
                        ];
                        $car_rent_in = CarRentalInclude::find($car_rental_include_id_ar[$index]);
                        if (!empty($car_rent_in)) {
                            $car_rent_in->update($car_rent_in_data);
                        }
                    }
                }
            }
            //update car aditional detail in FR
            $car_rental_include_id_fr= $request->car_rental_include_id_fr;
            if(count($rent_key_frs) > 0) {
                foreach ($rent_key_frs as $index =>$rent_key_fr) {
                    if(isset( $car_rental_include_id_fr[$index]) && $car_rental_include_id_fr[$index] != NULL) {
                        $car_rent_in_data = [
                            'fr' => [
                                'key'       => $rent_key_fr,
                                'value'      => $rent_valu_frs[$index],
                            ],
                            'car_id' => $$module_name_singular->id,
                        ];
                        $car_rent_in = CarRentalInclude::find($car_rental_include_id_fr[$index]);
                        if (!empty($car_rent_in)) {
                            $car_rent_in->update($car_rent_in_data);
                        }
                    }
                }
            }
            //update car aditional detail in RU
            $car_rental_include_id_ru= $request->car_rental_include_id_ru;
            if(count($rent_key_rus) > 0) {
                foreach ($rent_key_rus as $index =>$rent_key_ru) {
                    if(isset( $car_rental_include_id_ru[$index]) && $car_rental_include_id_ru[$index] != NULL) {
                        $car_rent_in_data = [
                            'ru' => [
                                'key'       => $rent_key_ru,
                                'value'      => $rent_valu_rus[$index],
                            ],
                            'car_id' => $$module_name_singular->id,
                        ];
                        $car_rent_in = CarRentalInclude::find($car_rental_include_id_ru[$index]);
                        if (!empty($car_rent_in)) {
                            $car_rent_in->update($car_rent_in_data);
                        }
                    }
                }
            }
            //delete car rental req
            $delete_car_rental_requirement_id  = $request->delete_car_rental_requirement_id;
            $delete_car_rental_requirement_arr = explode(',',$delete_car_rental_requirement_id);
            if($request->delete_car_rental_requirement_id != NULL) {
                foreach ($delete_car_rental_requirement_arr as $delete_car_rental_requirement) {
                    $car_rental_requirement = CarRentalRequirement::find($delete_car_rental_requirement);
                    $car_rental_requirement_trans = CarRentalRequirementTranslation::where('car_rental_requirement_id', $delete_car_rental_requirement)->first();
                    if(!empty($car_rental_requirement_trans)) {
                        $car_rental_requirement_trans->delete();
                    }
                    if(!empty($car_rental_requirement))
                    {
                        $car_rental_requirement->delete();
                    }
                }
            }
            //update car rental req in EN
            $rent_req_key_ens = $request->rent_req_key_en;
            $rent_req_value_ens = $request->rent_req_value_en;
            $rent_req_key_ars = $request->rent_req_key_ar;
            $rent_req_value_ars = $request->rent_req_value_ar;
            $rent_req_key_frs = $request->rent_req_key_fr;
            $rent_req_value_frs = $request->rent_req_value_fr;
            $rent_req_key_rus = $request->rent_req_key_ru;
            $rent_req_value_rus = $request->rent_req_value_ru;
            $car_rental_requirement_id_en= $request->car_rental_requirement_id_en;
            if(count($rent_req_key_ens) > 0) {
                foreach ($rent_req_key_ens as $index =>$rent_req_key_en) {
                    if(isset( $car_rental_requirement_id_en[$index]) && $car_rental_requirement_id_en[$index] != NULL) {
                        $car_rent_req_data = [
                            'en' => [
                                'key'       => $rent_req_key_en,
                                'value'      => $rent_req_value_ens[$index],
                            ],
                            'car_id' => $$module_name_singular->id,
                        ];
                        $car_rent_req = CarRentalRequirement::find($car_rental_requirement_id_en[$index]);
                        if (!empty($car_rent_req)) {
                            $car_rent_req->update($car_rent_req_data);
                        }
                    }
                    else {
                        $car_rent_req_data = [
                            'en' => [
                                'key'       => $rent_req_key_en,
                                'value'      => $rent_req_value_ens[$index],
                            ],
                            'ar' => [
                                'key'       =>isset($rent_req_key_ars[$index]) ? $rent_req_key_ars[$index] : '' ,
                                'value'      => isset($rent_req_value_ars[$index]) ? $rent_req_value_ars[$index] : '' ,
                            ],
                            'fr' => [
                                'key'       => isset($rent_req_key_frs[$index]) ? $rent_req_key_frs[$index] : '' ,
                                'value'      => isset($rent_req_value_frs[$index]) ? $rent_req_value_frs[$index] : '' ,
                            ],
                            'ru' => [
                                'key'       => isset($rent_req_key_rus[$index]) ? $rent_req_key_rus[$index] : '' ,
                                'value'      => isset($rent_req_value_rus[$index]) ? $rent_req_value_rus[$index] : '' ,
                            ],
                            'car_id' => $$module_name_singular->id,
                        ];
                        $car_rent_req = CarRentalRequirement::create($car_rent_req_data);
                    }
                }
            }
            //update car rental req in AR
            $car_rental_requirement_id_ar= $request->car_rental_requirement_id_ar;
            if(count($rent_req_key_ars) > 0) {
                foreach ($rent_req_key_ars as $index =>$rent_req_key_ar) {
                    if(isset( $car_rental_requirement_id_ar[$index]) && $car_rental_requirement_id_ar[$index] != NULL) {
                        $car_rent_req_data = [
                            'ar' => [
                                'key'       => $rent_req_key_ar,
                                'value'      => $rent_req_value_ars[$index],
                            ],
                            'car_id' => $$module_name_singular->id,
                        ];
                        $car_rent_req = CarRentalRequirement::find($car_rental_requirement_id_ar[$index]);
                        if (!empty($car_rent_req)) {
                            $car_rent_req->update($car_rent_req_data);
                        }
                    }
                }
            }
            //update car rental req in FR
            $car_rental_requirement_id_fr= $request->car_rental_requirement_id_fr;
            if(count($rent_req_key_frs) > 0) {
                foreach ($rent_req_key_frs as $index =>$rent_req_key_fr) {
                    if(isset( $car_rental_requirement_id_fr[$index]) && $car_rental_requirement_id_fr[$index] != NULL) {
                        $car_rent_req_data = [
                            'fr' => [
                                'key'       => $rent_req_key_fr,
                                'value'      => $rent_req_value_frs[$index],
                            ],
                            'car_id' => $$module_name_singular->id,
                        ];
                        $car_rent_req = CarRentalRequirement::find($car_rental_requirement_id_fr[$index]);
                        if (!empty($car_rent_req)) {
                            $car_rent_req->update($car_rent_req_data);
                        }
                    }
                }
            }
            //update car rental req in RU
            $car_rental_requirement_id_ru= $request->car_rental_requirement_id_ru;
            if(count($rent_req_key_rus) > 0) {
                foreach ($rent_req_key_rus as $index =>$rent_req_key_ru) {
                    if(isset( $car_rental_requirement_id_ru[$index]) && $car_rental_requirement_id_ru[$index] != NULL) {
                        $car_rent_req_data = [
                            'ru' => [
                                'key'       => $rent_req_key_ru,
                                'value'      => $rent_req_value_rus[$index],
                            ],
                            'car_id' => $$module_name_singular->id,
                        ];
                        $car_rent_req = CarRentalRequirement::find($car_rental_requirement_id_ru[$index]);
                        if (!empty($car_rent_req)) {
                            $car_rent_req->update($car_rent_req_data);
                        }
                    }

                }
            }
            $$module_name_singular->update($car_data);
            $car_id =Faq::where('reference_id', $$module_name_singular->id)->where('type','car')->first();
            // dd($car_id);
            if(!empty($car_id)){

                $faq = [
                    'name' => $request->car_custom_title_en,
                    'slug' =>$request->slug,
                    'status' => $request->status,
                    'type'  => 'car',
                ];
                $faq_add_id = Faq::where('reference_id',$car_id->reference_id)->where('type','car')->first();
                $faq_add_id->update($faq);
            }else{
                if($request->question_en[0]){
                    $faq_add_id = Faq::create([
                        'reference_id'=>$$module_name_singular->id,
                        'name' => $request->car_custom_title_en,
                        'slug' =>$request->slug,
                        'status' => $request->status,
                        'type'  => 'car',

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
            if(!empty($question_ens != '') && count($question_ens) > 0) {
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
            if(!empty($question_ars) ||count($question_ars) > 0) {
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
            if(!empty($question_frs) || count($question_frs) > 0) {
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
            if(!empty($question_frs) || count($question_rus) > 0) {
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
     flash("<i class='fas fa-check'></i> ".Str::singular($module_title).__('common.updated_data'))->success()->important();
            Log::info(label_case($module_title.' '.$module_action)." | '".$$module_name_singular->name.'(ID:'.$$module_name_singular->id.") ' by User:".auth()->user()->name.'(ID:'.auth()->user()->id.')');

            return response()->json([
                'status' => 1,
                'message' => "<i class='fas fa-check'></i>  " . Str::singular($module_title) . __('common.updated_data'),
                'data' => [
                    'redirect' => url("admin/$module_name")
                ]
            ]);
        }
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
        $module_title = __('car.cars');
        $$module_name_singular = $module_model::findOrFail($id);
        $image = $$module_name_singular->image;

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

        return view(
            "car::backend.$module_name.show",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_name_singular', 'module_action','image', "$module_name_singular")
        );
    }

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
        $module_title = __('car.cars');
        $$module_name_singular = $module_model::findOrFail($id);
        $$module_name_singular->delete();

        flash("<i class='fas fa-check'></i> ".Str::singular($module_title).__('common.deleted_data'))->success()->important();
        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

        return redirect("admin/$module_name");
    }

    public function clone($id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.clone');
        $module_title = __('car.cars');

        $$module_name_singular = $module_model::findOrFail($id);

        $car_translation_en = CarTranslation::where('locale', 'en')->where('car_id', $$module_name_singular->id)->first();
        $car_translation_ar = CarTranslation::where('locale', 'ar')->where('car_id', $$module_name_singular->id)->first();
        $car_translation_fr = CarTranslation::where('locale', 'fr')->where('car_id', $$module_name_singular->id)->first();
        $car_translation_ru= CarTranslation::where('locale', 'ru')->where('car_id', $$module_name_singular->id)->first();

        $new_car = Car::create([
            'en' => [
                'name'          => (!empty($car_translation_en) && isset($car_translation_en->name)) ? $car_translation_en->name.'1' : '',
                'custom_title'  => (!empty($car_translation_en) && isset($car_translation_en->custom_title)) ? $car_translation_en->custom_title : '',
                'description'   => (!empty($car_translation_en) && isset($car_translation_en->description)) ? $car_translation_en->description : '',
                'supplier_note' => (!empty($car_translation_en) && isset($car_translation_en->supplier_note)) ? $car_translation_en->supplier_note : '',
                'delivery'      => (!empty($car_translation_en) && isset($car_translation_en->delivery)) ? $car_translation_en->delivery : '',
                'insurance'     => (!empty($car_translation_en) && isset($car_translation_en->insurance)) ? $car_translation_en->insurance : '',
                'faq'           => (!empty($car_translation_en) && isset($car_translation_en->faq)) ? $car_translation_en->faq : '',

                'meta_title'            => (!empty($car_translation_en) && isset($car_translation_en->meta_title)) ? $car_translation_en->meta_title : '',
                'meta_description'      => (!empty($car_translation_en) && isset($car_translation_en->meta_description)) ? $car_translation_en->meta_description : '',
                'meta_keyword'          => (!empty($car_translation_en) && isset($car_translation_en->meta_keyword)) ? $car_translation_en->meta_keyword : '',
            ],
            'ar' => [
                'name'          => (!empty($car_translation_ar) && isset($car_translation_ar->name)) ? $car_translation_ar->name.'1' : '',
                'custom_title'  => (!empty($car_translation_ar) && isset($car_translation_ar->custom_title)) ? $car_translation_ar->custom_title : '',
                'description'   => (!empty($car_translation_ar) && isset($car_translation_ar->description)) ? $car_translation_ar->description : '',
                'supplier_note' => (!empty($car_translation_ar) && isset($car_translation_ar->supplier_note)) ? $car_translation_ar->supplier_note : '',
                'delivery'      => (!empty($car_translation_ar) && isset($car_translation_ar->delivery)) ? $car_translation_ar->delivery : '',
                'insurance'     => (!empty($car_translation_ar) && isset($car_translation_ar->insurance)) ? $car_translation_ar->insurance : '',
                'faq'           => (!empty($car_translation_ar) && isset($car_translation_ar->faq)) ? $car_translation_ar->faq : '',

                'meta_title'            => (!empty($car_translation_ar) && isset($car_translation_ar->meta_title)) ? $car_translation_ar->meta_title : '',
                'meta_description'      => (!empty($car_translation_ar) && isset($car_translation_ar->meta_description)) ? $car_translation_ar->meta_description : '',
                'meta_keyword'          => (!empty($car_translation_ar) && isset($car_translation_ar->meta_keyword)) ? $car_translation_ar->meta_keyword : '',
            ],
            'fr' => [
                'name'          => (!empty($car_translation_fr) && isset($car_translation_fr->name)) ? $car_translation_fr->name.'1' : '',
                'custom_title'  => (!empty($car_translation_fr) && isset($car_translation_fr->custom_title)) ? $car_translation_fr->custom_title : '',
                'description'   => (!empty($car_translation_fr) && isset($car_translation_fr->description)) ? $car_translation_fr->description : '',
                'supplier_note' => (!empty($car_translation_fr) && isset($car_translation_fr->supplier_note)) ? $car_translation_fr->supplier_note : '',
                'delivery'      => (!empty($car_translation_fr) && isset($car_translation_fr->delivery)) ? $car_translation_fr->delivery : '',
                'insurance'     => (!empty($car_translation_fr) && isset($car_translation_fr->insurance)) ? $car_translation_fr->insurance : '',
                'faq'           => (!empty($car_translation_fr) && isset($car_translation_fr->faq)) ? $car_translation_fr->faq : '',

                'meta_title'            => (!empty($car_translation_fr) && isset($car_translation_fr->meta_title)) ? $car_translation_fr->meta_title : '',
                'meta_description'      => (!empty($car_translation_fr) && isset($car_translation_fr->meta_description)) ? $car_translation_fr->meta_description : '',
                'meta_keyword'          => (!empty($car_translation_fr) && isset($car_translation_fr->meta_keyword)) ? $car_translation_fr->meta_keyword : '',
            ],
            'ru' => [
                'name'          => (!empty($car_translation_ru) && isset($car_translation_ru->name)) ? $car_translation_ru->name.'1' : '',
                'custom_title'  => (!empty($car_translation_ru) && isset($car_translation_ru->custom_title)) ? $car_translation_ru->custom_title : '',
                'description'   => (!empty($car_translation_ru) && isset($car_translation_ru->description)) ? $car_translation_ru->description : '',
                'supplier_note' => (!empty($car_translation_ru) && isset($car_translation_ru->supplier_note)) ? $car_translation_ru->supplier_note : '',
                'delivery'      => (!empty($car_translation_ru) && isset($car_translation_ru->delivery)) ? $car_translation_ru->delivery : '',
                'insurance'     => (!empty($car_translation_ru) && isset($car_translation_ru->insurance)) ? $car_translation_ru->insurance : '',
                'faq'           => (!empty($car_translation_ru) && isset($car_translation_ru->faq)) ? $car_translation_ru->faq : '',

                'meta_title'            => (!empty($car_translation_ru) && isset($car_translation_ru->meta_title)) ? $car_translation_ru->meta_title : '',
                'meta_description'      => (!empty($car_translation_ru) && isset($car_translation_ru->meta_description)) ? $car_translation_ru->meta_description : '',
                'meta_keyword'          => (!empty($car_translation_ru) && isset($car_translation_ru->meta_keyword)) ? $car_translation_ru->meta_keyword : '',
            ],
            'slug'                  => $$module_name_singular->slug.'1',
            'car_brand_id'          => $$module_name_singular->car_brand_id,
            'car_type_id'           => $$module_name_singular->car_type_id,
            'custom_url_slug'       => $$module_name_singular->custom_url_slug,
            //'deal_type'             => $request->input('deal_type'),
            'car_model_year'        => $$module_name_singular->car_model_year,
            'deposit'               => $$module_name_singular->deposit,
            //'kms'                 => $request->input('kms'),
            'daily_mileage_limit'   => $$module_name_singular->daily_mileage_limit,
            'weekly_mileage_limit'  => $$module_name_singular->weekly_mileage_limit,
            'monthly_mileage_limit' => $$module_name_singular->monthly_mileage_limit,
            'min_age'               => $$module_name_singular->min_age,
            'daily_price'           => $$module_name_singular->daily_price,
            'weekly_price'          => $$module_name_singular->weekly_price,
            'monthly_price'         => $$module_name_singular->monthly_price,
            'is_available'          => $$module_name_singular->is_available,
            //'is_most_rented'       => $$module_name_singular->slug,
            'status'                => $$module_name_singular->status,
        ]);

        //store car types
            if(count($$module_name_singular->car_has_car_types) > 0) {
                foreach($$module_name_singular->car_has_car_types as $car_type_id) {
                    CarHasCarType::create([
                        'car_id' => $new_car->id,
                        'car_type_id' => $car_type_id->car_type_id
                    ]);
                }
            }

        //upload car image
        if (count($$module_name_singular->car_images) > 0) {
            foreach ($$module_name_singular->car_images as $key=>$image) {
                $car_image = CarImage::create([
                    'car_id' => $new_car->id,
                    'position' => $key + 1,
                    'image' => $image->image
                ]);
            }
        }

        //store car features in english
        if (count($$module_name_singular->car_features) > 0) {
            foreach ($$module_name_singular->car_features as $index => $car_features) {
                $feature_en = CarFeatureTranslation::where('locale', 'en')->where('car_feature_id', $car_features->id)->first();
                $feature_ar = CarFeatureTranslation::where('locale', 'ar')->where('car_feature_id', $car_features->id)->first();
                $feature_fr = CarFeatureTranslation::where('locale', 'fr')->where('car_feature_id', $car_features->id)->first();
                $feature_ru = CarFeatureTranslation::where('locale', 'ru')->where('car_feature_id', $car_features->id)->first();
                $car_data = [
                    'en' => [
                        'feature_title' => (!empty($feature_en) && isset($feature_en->feature_title)) ? $feature_en->feature_title : '',
                    ],
                    'ar' => [
                        'feature_title' => (!empty($feature_ar) && isset($feature_ar->feature_title)) ? $feature_ar->feature_title : '',
                    ],
                    'fr' => [
                        'feature_title' => (!empty($feature_fr) && isset($feature_fr->feature_title)) ? $feature_fr->feature_title : '',
                    ],
                    'ru' => [
                        'feature_title' => (!empty($feature_ru) && isset($feature_ru->feature_title)) ? $feature_ru->feature_title : '',
                    ],
                    'car_id' => $new_car->id,
                    'icon_html' => $car_features->icon_html,
                ];
                $car_feature = CarFeature::create($car_data);
            }
        }

        //store delivery service in EN
        if (count($$module_name_singular->car_delivery_pick_up_services) > 0) {
            foreach ($$module_name_singular->car_delivery_pick_up_services as $index => $service_title_en) {
                $services_en = CarDeliveryPickUpServiceTranslation::where('locale', 'en')->where('car_delivery_pick_up_service_id', $service_title_en->id)->first();
                $services_ar = CarDeliveryPickUpServiceTranslation::where('locale', 'ar')->where('car_delivery_pick_up_service_id', $service_title_en->id)->first();
                $services_fr = CarDeliveryPickUpServiceTranslation::where('locale', 'fr')->where('car_delivery_pick_up_service_id', $service_title_en->id)->first();
                $services_ru = CarDeliveryPickUpServiceTranslation::where('locale', 'ru')->where('car_delivery_pick_up_service_id', $service_title_en->id)->first();
                $car_ser_data = [
                    'en' => [
                        'service_title' => (!empty($services_en) && isset($services_en->service_title)) ? $services_en->service_title : '',
                    ],
                    'ar' => [
                        'service_title' =>   (!empty($services_ar) && isset($services_ar->service_title)) ? $services_ar->service_title : '',
                    ],
                    'fr' => [
                        'service_title' =>   (!empty($services_fr) && isset($services_fr->service_title)) ? $services_fr->service_title : '',
                    ],
                    'ru' => [
                        'service_title' =>   (!empty($services_ru) && isset($services_ru->service_title)) ? $services_ru->service_title : '',
                    ],
                    'car_id' => $new_car->id,
                ];
                $car_deliverypick_service = CarDeliveryPickUpService::create($car_ser_data);
            }
        }

        //store car rent in EN
        if (count($$module_name_singular->car_rent_details) > 0) {
            foreach ($$module_name_singular->car_rent_details as $index => $rent_detail_en) {
                $rents_en = CarRentDetailTranslation::where('locale', 'en')->where('car_rent_detail_id', $rent_detail_en->id)->first();
                $rents_ar = CarRentDetailTranslation::where('locale', 'ar')->where('car_rent_detail_id', $rent_detail_en->id)->first();
                $rents_fr = CarRentDetailTranslation::where('locale', 'fr')->where('car_rent_detail_id', $rent_detail_en->id)->first();
                $rents_ru = CarRentDetailTranslation::where('locale', 'ru')->where('car_rent_detail_id', $rent_detail_en->id)->first();
                $car_rent_data = [
                    'en' => [
                        'rent_detail_text' => (!empty($rents_en) && isset($rents_en->rent_detail_text)) ? $rents_en->rent_detail_text : '',
                    ],
                    'ar' => [
                        'rent_detail_text' => (!empty($rents_ar) && isset($rents_ar->rent_detail_text)) ? $rents_ar->rent_detail_text : '',
                    ],
                    'fr' => [
                        'rent_detail_text' => (!empty($rents_fr) && isset($rents_fr->rent_detail_text)) ? $rents_fr->rent_detail_text : '',
                    ],
                    'ru' => [
                        'rent_detail_text' => (!empty($rents_ru) && isset($rents_ru->rent_detail_text)) ? $rents_ru->rent_detail_text : '',
                    ],
                    'car_id' => $new_car->id,
                ];
                $car_rent_detail = CarRentDetail::create($car_rent_data);
            }
        }

        //store car specification in EN
        if (count($$module_name_singular->car_specifications) > 0) {
            foreach ($$module_name_singular->car_specifications as $index => $specification_title_en) {
                $specification_en = CarSpecificationTranslation::where('locale', 'en')->where('car_specification_id', $specification_title_en->id)->first();
                $specification_ar = CarSpecificationTranslation::where('locale', 'ar')->where('car_specification_id', $specification_title_en->id)->first();
                $specification_fr = CarSpecificationTranslation::where('locale', 'fr')->where('car_specification_id', $specification_title_en->id)->first();
                $specification_ru = CarSpecificationTranslation::where('locale', 'ru')->where('car_specification_id', $specification_title_en->id)->first();
                $car_spe_data = [
                    'en' => [
                        'specification_title' => (!empty($specification_en) && isset($specification_en->specification_title)) ? $specification_en->specification_title : '',
                    ],
                    'ar' => [
                        'specification_title' => (!empty($specification_ar) && isset($specification_ar->specification_title)) ? $specification_ar->specification_title : '',
                    ],
                    'fr' => [
                        'specification_title' => (!empty($specification_fr) && isset($specification_fr->specification_title)) ? $specification_fr->specification_title : '',
                    ],
                    'ru' => [
                        'specification_title' => (!empty($specification_ru) && isset($specification_ru->specification_title)) ? $specification_ru->specification_title : '',
                    ],
                    'car_id' => $new_car->id,
                    'icon_html' => $specification_title_en->icon_html,
                ];
                $car_specification = CarSpecification::create($car_spe_data);
            }
        }
        //store car aditional detail in EN
        if (count($$module_name_singular->car_rental_includes) > 0) {
            foreach ($$module_name_singular->car_rental_includes as $index => $rent_key_en) {
                $rent_ens = CarRentalIncludeTranslation::where('locale', 'en')->where('car_rental_include_id', $rent_key_en->id)->first();
                $rent_ars = CarRentalIncludeTranslation::where('locale', 'ar')->where('car_rental_include_id', $rent_key_en->id)->first();
                $rent_frs = CarRentalIncludeTranslation::where('locale', 'fr')->where('car_rental_include_id', $rent_key_en->id)->first();
                $rent_rus = CarRentalIncludeTranslation::where('locale', 'ru')->where('car_rental_include_id', $rent_key_en->id)->first();
                $car_rent_in_data = [
                    'en' => [
                        'key' => (!empty($rent_ens) && isset($rent_ens->key)) ? $rent_ens->key : '',
                        'value' => (!empty($rent_ens) && isset($rent_ens->value)) ? $rent_ens->value : '',
                    ],
                    'ar' => [
                        'key' => (!empty($rent_ars) && isset($rent_ars->key)) ? $rent_ars->key : '',
                        'value' => (!empty($rent_ars) && isset($rent_ars->value)) ? $rent_ars->value : '',
                    ],
                    'fr' => [
                        'key' => (!empty($rent_frs) && isset($rent_frs->key)) ? $rent_frs->key : '',
                        'value' => (!empty($rent_frs) && isset($rent_frs->value)) ? $rent_frs->value : '',
                    ],
                    'ru' => [
                        'key' => (!empty($rent_rus) && isset($rent_rus->key)) ? $rent_rus->key : '',
                        'value' => (!empty($rent_rus) && isset($rent_rus->value)) ? $rent_rus->value : '',
                    ],
                    'car_id' => $new_car->id,
                ];
                $car_rent_in = CarRentalInclude::create($car_rent_in_data);
            }
        }
        //store car rental req IN EN
        if (count($$module_name_singular->car_rental_requirements) > 0) {
            foreach ($$module_name_singular->car_rental_requirements as $index => $rent_req_key_en) {
                $rent_req_ens = CarRentalRequirementTranslation::where('locale', 'en')->where('car_rental_requirement_id', $rent_req_key_en->id)->first();
                $rent_req_ars = CarRentalRequirementTranslation::where('locale', 'ar')->where('car_rental_requirement_id', $rent_req_key_en->id)->first();
                $rent_req_frs = CarRentalRequirementTranslation::where('locale', 'fr')->where('car_rental_requirement_id', $rent_req_key_en->id)->first();
                $rent_req_rus = CarRentalRequirementTranslation::where('locale', 'ru')->where('car_rental_requirement_id', $rent_req_key_en->id)->first();
                $car_rent_req_data = [
                    'en' => [
                        'key' => (!empty($rent_req_ens) && isset($rent_req_ens->key)) ? $rent_req_ens->key : '',
                        'value' => (!empty($rent_req_ens) && isset($rent_req_ens->value)) ? $rent_req_ens->value : '',
                    ],
                    'ar' => [
                        'key' => (!empty($rent_req_ars) && isset($rent_req_ars->key)) ? $rent_req_ars->key : '',
                        'value' => (!empty($rent_req_ars) && isset($rent_req_ars->value)) ? $rent_req_ars->value : '',
                    ],
                    'fr' => [
                        'key' => (!empty($rent_req_frs) && isset($rent_req_frs->key)) ? $rent_req_frs->key : '',
                        'value' => (!empty($rent_req_frs) && isset($rent_req_frs->value)) ? $rent_req_frs->value : '',
                    ],
                    'ru' => [
                        'key' => (!empty($rent_req_rus) && isset($rent_req_rus->key)) ? $rent_req_rus->key : '',
                        'value' => (!empty($rent_req_rus) && isset($rent_req_rus->value)) ? $rent_req_rus->value : '',
                    ],
                    'car_id' => $new_car->id,
                ];
                $car_rent_req = CarRentalRequirement::create($car_rent_req_data);
            }
        }
        flash("<i class='fas fa-check'></i>  " . Str::singular($module_title) . __('common.clone_data') )->success()->important();
        return redirect("admin/$module_name");
    }
    //JM vpn Changes
    public function delete($id){
        $module_name = $this->module_name;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);
        $$module_name_singular = $module_model::findOrFail($id);
        $data['feature_image'] =null;
        $filepath="frontend/Feature/Car/".$$module_name_singular->feature_image;
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
        $$module_name_singular->forceDelete();
        session()->flash('alert-delete', 'Car has been Delete successfully');
        return response()->json(['redirect_url' => '/admin/carbrands/']);

    }
}
