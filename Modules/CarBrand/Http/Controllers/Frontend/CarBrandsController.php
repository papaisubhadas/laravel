<?php

namespace Modules\CarBrand\Http\Controllers\Frontend;

use App\Models\Country;
use Modules\Faq\Models\Faq;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Modules\Page\Models\Page;

class CarBrandsController extends Controller
{
    public function __construct()
    {
        // Page Title
        $this->module_title = 'CarBrands';

        // module name
        $this->module_name = 'carbrands';

        // directory path of the module
        $this->module_path = 'carbrand::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\CarBrand\Models\CarBrand";
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
            "carbrand::frontend.$module_path.index",
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
            "carbrand::frontend.$module_name.show",
            compact('module_title', 'module_name', 'module_icon', 'module_action', 'module_name_singular', "$module_name_singular", 'posts')
        );
    }

    public function car_brands()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';

        $$module_name = $module_model::active()->orderBy('id', 'desc')->get();
        
        $cms_section = Page::where('type', 'section')->where('slug', 'car-brands-description')->where('status', 'active')->first();

        return view(
            "carbrand::frontend.$module_name.list",
            compact('module_title', 'module_name', "$module_name", 'module_icon', 'module_action', 'module_name_singular','cms_section')
        );
    }

    public function car_brand_details($slug)
    {
        $module_model = $this->module_model;
        $module_name = $this->module_name;
        $car_brand = $module_model::where('slug','=',$slug)->first();
        if(!empty($car_brand)) {
            $cars = array();
            if ($car_brand) {
                $cars = \Modules\Car\Models\Car::with('deals')->select('cars.*')
                    //->leftJoin('car_types', 'car_types.id', '=', 'cars.car_type_id')
                    ->leftJoin('car_brands', 'car_brands.id', '=', 'cars.car_brand_id')
                    //->where('car_types.status', 'active')
                    ->where('car_brands.status', 'active')
                    ->where('cars.status', 'active')
                    ->where('cars.is_available', 'yes')
                    ->where('cars.car_brand_id', '=', $car_brand->id)
                    ->groupBy('cars.id')
                    ->get();
            }
            $faq_details = Faq::leftjoin('car_brands', 'faqs.reference_id','=','car_brands.id')
                ->leftjoin('faq_qa_details','faqs.id','=','faq_qa_details.faq_id')
                ->leftjoin('faq_qa_detail_translations','faq_qa_details.id','=','faq_qa_detail_translations.faq_qa_detail_id')
                ->select('faq_qa_detail_translations.*')
                ->where('car_brands.slug', $slug)
                ->where('faq_qa_detail_translations.locale','=',App::currentLocale())
                ->where('faqs.reference_id',$car_brand->id)->where('type','car-brand')
                ->get();

            $meta_title = !empty($car_brand->meta_title)  ? $car_brand->meta_title : 'Friends Car Rental - ' . __('text.car_brand');
            $phone_codes = Country::select(DB::raw('LOWER(iso) as iso_c,country.*'))->get();
            $dubai_phone_codes = Country::where('iso', 'AE')->first();
            $phone_no = \App\Models\Setting::where('type', 'phone_no')->where('section', 'footer')->first();
            return view("carbrand::frontend.$module_name.car-brand", compact('cars', 'car_brand', 'phone_codes', 'dubai_phone_codes','phone_no','faq_details','meta_title'));
        }
        else {
            abort(404);
        }

    }
}
