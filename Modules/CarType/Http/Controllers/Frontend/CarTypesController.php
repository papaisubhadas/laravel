<?php

namespace Modules\CarType\Http\Controllers\Frontend;

use App\Models\Country;
use Modules\Faq\Models\Faq;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Modules\Page\Models\Page;

class CarTypesController extends Controller
{
    public $rowperpage = 9; // Number of rowperpage

    public function __construct()
    {
        // Page Title
        $this->module_title = 'CarTypes';

        // module name
        $this->module_name = 'cartypes';

        // directory path of the module
        $this->module_path = 'cartype::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "App\Models\CarType";
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

        $module_action = 'List';

        $$module_name = $module_model::latest()->paginate();

        return view(
            "cartype::frontend.$module_path.index",
            compact('module_title', 'module_name', "$module_name", 'module_icon', 'module_action', 'module_name_singular')
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $id = decode_id($id);

        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Show';

        $$module_name_singular = $module_model::findOrFail($id);

        return view(
            "cartype::frontend.$module_name.show",
            compact('module_title', 'module_name', 'module_icon', 'module_action', 'module_name_singular', "$module_name_singular", 'posts')
        );
    }

    public function car_types()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';

        $$module_name = \Modules\CarType\Models\CarType::active()->orderBy('id', 'desc')->get();
        $meta_title = !empty($$module_name_singular->meta_title)  ? $$module_name_singular->meta_title : '';
        $meta_description = !empty($$module_name_singular->meta_description)  ? $$module_name_singular->meta_description : '';
        $meta_keywords = !empty($$module_name_singular->meta_keyword)  ? $$module_name_singular->meta_keyword : '';

        $cms_section = Page::where('type', 'section')->where('slug', 'car-types-description')->where('status', 'active')->first();

        return view(
            "cartype::frontend.$module_name.list",
            compact('module_title', 'module_name', "$module_name", 'module_icon', 'module_action', 'module_name_singular','meta_title','meta_description','meta_keywords','cms_section')
        );
    }

    public function car_type_details($slug)
    {
        $module_name = $this->module_name;
        if(request()->get("page")){
            $page = request()->get("page");
            // $most_rented_cars = getMostRentedCars($request, getMostRentedCarsLimit());
            // $lastPage = $most_rented_cars->lastPage();
            // $currentPage = $most_rented_cars->currentPage();
            // $page = ($lastPage >= $currentPage) ? ($most_rented_cars->currentPage()+1) : 0;
            // $view = view('frontend.pages.home.most_rented_cars_data',compact('page','most_rented_cars'))->render();
            // return response()->json(['html' => $view, 'page'=>$page]);
        }

        $car_type = \Modules\CarType\Models\CarType::where('slug','=',$slug)->first();
        if(!empty($car_type)) {
            $cars = \Modules\Car\Models\Car::with([
            "car_offers"=>function($q){
                $q->where("offer_start_date","<",date('Y-m-d'))
                ->where("offer_end_date",">","date('Y-m-d')")
                ->where("status","active");
            },
            "car_images_first",
            "deals",
            "car_brand",
            "car_specifications",
            "car_rent_details"
            ])
            ->select('cars.*')
            //->leftJoin('car_types', 'car_types.id', '=', 'cars.car_type_id')
            ->leftJoin('car_has_car_types', 'car_has_car_types.car_id', '=', 'cars.id')
            ->leftJoin('car_brands', 'car_brands.id', '=', 'cars.car_brand_id')
            //->where('car_types.status', 'active')
            ->where('car_brands.status', 'active')
            ->where('cars.status', 'active')
            ->where('cars.is_available', 'yes')
            ->where('car_has_car_types.car_type_id', '=', $car_type->id)
            ->groupBy('cars.id')
            ->get();
//            $cars = Car::select('cars.*')
//                //->leftJoin('car_types', 'car_types.id', '=', 'cars.car_type_id')
//                ->leftJoin('car_brands', 'car_brands.id', '=', 'cars.car_brand_id')
//                ->leftJoin('car_has_car_types', 'car_has_car_types.car_id', '=', 'cars.id')
//                //->where('car_types.status', 'active')
//                ->where('car_brands.status', 'active')
//                ->where('cars.status', 'active')
//                ->where('cars.is_available', 'yes')
//                ->where('car_has_car_types.car_type_id', '=', $car_type->id)
//                ->get();

        $faq_details = Faq::leftjoin('car_types', 'faqs.reference_id','=','car_types.id')
                    ->leftjoin('faq_qa_details','faqs.id','=','faq_qa_details.faq_id')
                    ->leftjoin('faq_qa_detail_translations','faq_qa_details.id','=','faq_qa_detail_translations.faq_qa_detail_id')
                    ->select('faq_qa_detail_translations.*')
                    ->where('car_types.slug', $slug)
                    ->where('faq_qa_detail_translations.locale','=',App::currentLocale())
                    ->where('faqs.reference_id',$car_type->id)->where('type','car-type')
                    ->get();

            $meta_title = !empty($car_type->meta_title)  ? $car_type->meta_title : 'Friends Car Rental - ' . __('text.car_types');
            $phone_codes = Country::select(DB::raw('LOWER(iso) as iso_c,country.*'))->get();
            $dubai_phone_codes = Country::where('iso', 'AE')->first();
            // $phone_no = \App\Models\Setting::where('type', 'phone_no')->where('section', 'footer')->first();
            return view("cartype::frontend.$module_name.car-type", compact('cars', 'car_type', 'phone_codes', 'dubai_phone_codes','faq_details','meta_title'));
        }
        else {
            abort(404);
        }

    }


}
