<?php

namespace Modules\Deal\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use App\Models\Country;
use App\Models\Setting;
use Modules\Faq\Models\Faq;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class DealsController extends Controller
{
    public function __construct()
    {
        // Page Title
        $this->module_title = 'Deals';

        // module name
        $this->module_name = 'deals';

        // directory path of the module
        $this->module_path = 'deal::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\Deal\Models\Deal";
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
            "deal::frontend.$module_path.index",
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
            "deal::frontend.$module_name.show",
            compact('module_title', 'module_name', 'module_icon', 'module_action', 'module_name_singular', "$module_name_singular", 'posts')
        );
    }

    public function get_deal_by_type($type)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);
        $module_action = 'Get deal by type';
        $$module_name_singular = $module_model::with(['cars.car_offers'=>function($q){
            $q->where("offer_start_date","<",date('Y-m-d'))
            ->where("offer_end_date",">","date('Y-m-d')")
            ->where("status","active");
        },'cars.car_images_first','cars.deals','cars.car_brand','cars.car_specifications','cars.car_rent_details','deal_translations'=>function($t){
            $t->where('deal_translations.locale','=',App::currentLocale());
        }])      
        ->where('deal_type','=',$type)->first();
        // dd($$module_name_singular);
        
        if(empty($$module_name_singular)){
            abort(404);
        }
        
        // $phone_codes = Country::select(DB::raw('LOWER(iso) as iso_c,country.*'))->get();
        $dubai_phone_codes = Country::where('iso', 'AE')->first();
        // $phone_no = Setting::where('type', 'phone_no')->where('section', 'footer')->first();


        $faq_details = Faq::leftjoin('deals', 'faqs.reference_id','=','deals.id')
                    ->leftjoin('faq_qa_details','faqs.id','=','faq_qa_details.faq_id')
                    ->leftjoin('faq_qa_detail_translations','faq_qa_details.id','=','faq_qa_detail_translations.faq_qa_detail_id')
                    ->select('faq_qa_detail_translations.*')
                    ->where('deals.deal_type', $type)
                    ->where('deals.status','active')
                    ->where('faq_qa_detail_translations.locale','=',App::currentLocale())
                    ->where('faqs.reference_id',$$module_name_singular->id)->where('faqs.type','deal')
                    ->get();

        $meta_title = !empty($$module_name_singular->meta_title)  ? $$module_name_singular->meta_title : '';
        $meta_description = !empty($$module_name_singular->meta_description)  ? $$module_name_singular->meta_description : '';
        $meta_keywords = !empty($$module_name_singular->meta_keyword)  ? $$module_name_singular->meta_keyword : '';
        $feature_image = !empty($$module_name_singular->feature_image)  ? $$module_name_singular->feature_image : '';

        return view(
            "deal::frontend.$module_name.get_deal_by_type",
            compact('module_title', 'module_name', 'module_icon', 'module_action', 'module_name_singular',"$module_name_singular",'dubai_phone_codes','meta_title','meta_description','meta_keywords','feature_image','faq_details')
        );
    }
}
