<?php

namespace Modules\Car\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use App\Models\Setting;
use Modules\Car\Models\Car;
use Modules\Faq\Models\Faq;
use App\Mail\CarBookNow;
use App\Models\Country;
use Modules\Page\Models\Page;
use Modules\CarInquiry\Models\CarInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Carbon;

class CarsController extends Controller
{
    public $rowperpage = 9;
    public function __construct()
    {
        // Page Title
        $this->module_title = 'Cars';

        // module name
        $this->module_name = 'cars';

        // directory path of the module
        $this->module_path = 'car::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

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

        $module_action = 'List';

        $$module_name = $module_model::latest()->paginate();
            abort(404);
        // return view(
        //     "car::frontend.$module_path.index",
        //     compact('module_title', 'module_name', "$module_name", 'module_icon', 'module_action', 'module_name_singular')
        // );
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
        if(empty($$module_name_singular)) {
            abort(404);
        }

        return view(
            "car::frontend.$module_name.show",
            compact('module_title', 'module_name', 'module_icon', 'module_action', 'module_name_singular', "$module_name_singular", 'posts')
        );
    }
    public function car_details(Request $request,$slug)
    {
        $module_name = $this->module_name;
        $car = Car::with(["car_offers"=>function($q){
            $q->where("offer_start_date","<",date('Y-m-d'))
            ->where("offer_end_date",">","date('Y-m-d')")
            ->where("status","active");
        },
        "car_images_first",
        "deals",
        "car_brand",
        "car_specifications",
        "car_rent_details",
        "car_images",
        "car_rental_includes",
        "car_rental_requirements",
        "car_features",
        "car_delivery_pick_up_services"])->where('slug', $slug)->first();

        if(!empty($car)) {
            $faq_details = Faq::leftjoin('cars', 'faqs.reference_id','=','cars.id')
                ->leftjoin('faq_qa_details','faqs.id','=','faq_qa_details.faq_id')
                ->leftjoin('faq_qa_detail_translations','faq_qa_details.id','=','faq_qa_detail_translations.faq_qa_detail_id')
                ->select('faq_qa_detail_translations.*')
                ->where('cars.slug', $slug)
                ->where('faq_qa_detail_translations.locale','=',App::currentLocale())
                ->where('faqs.reference_id',$car->id)->where('type','car')
                ->get();

            $car_type =  $car->car_type != NULL ? $car->car_type : '';
            $car_type_title = !empty($car_type) ? $car_type->title : '';
            //get phone no
            // $phone_no = Setting::where('type', 'phone_no')->where('section', 'footer')->first();
            //get country code and phone code
            $phone_codes = Country::select(DB::raw('LOWER(iso) as iso_c,country.*'))->get();
            $dubai_phone_codes = Country::where('iso', 'AE')->first();

            if(count($car->car_has_car_types) > 0) {
                $car_type_ids = $car->car_has_car_types->pluck('car_type_id')->toArray();
            }
            $similar_car_data = [];
            //get similar cars
            if(isset($car_type_ids) && count($car_type_ids) > 0) {
                $similar_car_data = Car::with(["car_offers"=>function($q){
                    $q->where("offer_start_date","<",date('Y-m-d'))
                    ->where("offer_end_date",">","date('Y-m-d')")
                    ->where("status","active");
                },
                "car_images_first",
                "deals",
                "car_brand",
                "car_specifications",
                "car_rent_details",
                "car_images",
                "car_rental_includes",
                "car_rental_requirements",
                "car_features"])
                // ->select('cars.*')
                ->whereHas('car_brand',function($q){
                    $q->where('status', 'active');
                })
                ->whereHas('car_has_car_types',function($q) use($car_type_ids){
                    $q->whereIn('car_type_id', $car_type_ids);
                })
               /*  ->join('car_brands', 'car_brands.id', '=', 'cars.car_brand_id')
                ->join('car_has_car_types', 'car_has_car_types.car_id', '=', 'cars.id')
                ->where('car_brands.status', 'active') */
                ->where('cars.status', 'active')
                ->where('cars.is_available', 'yes')
                // ->whereIn('car_has_car_types.car_type_id', $car_type_ids)
                ->where('cars.id', '!=', $car->id)
                // ->groupBy('cars.id')
                ->get();

            }
            $meta_title = !empty($car->meta_title)  ? $car->meta_title : 'Friends Car Rental';
            $cms_section = Page::where('type', 'section')->where('slug', 'required-documents')->where('status', 'active')->first();
            return view("car::frontend.$module_name.car-details",compact('car_type', 'car', 'car_type_title',  'phone_codes', 'dubai_phone_codes', 'similar_car_data', 'cms_section' ,'faq_details','meta_title'));
        }
        else {
            abort(404);
        }
    }
    public function get_latest_rental_offer_car(Request $request){

        $start = $request->get("start");
        $today = date('Y-m-d');
        // Fetch records
        $records = Car::select('cars.*')
            ->leftJoin('car_brands', 'car_brands.id', '=', 'cars.car_brand_id')
            ->leftJoin('car_offers', 'car_offers.car_id', '=', 'cars.id')
            ->where('car_brands.status', 'active')
            ->where('cars.status', 'active')
            ->where('cars.is_available', 'yes')
            ->where('car_offers.offer_start_date', '<', $today)
            ->where('car_offers.offer_end_date', '>', $today)
            ->where('car_offers.status', 'active')
            ->orderBy('car_offers.id', 'desc')
            ->skip($start)
            ->take($this->rowperpage)
            ->get();

        $html = "";
        foreach($records as $record){
            $html_inner = '';
            $car_offers_var = $record->car_offers;
            $today = date('Y-m-d');
            $flag = false;
            if(count($car_offers_var) > 0) {
                foreach ($car_offers_var  as $car_offer) {
                    $car_offer_data = $car_offer->where('car_offers.offer_start_date', '<', $today)->where('car_offers.offer_end_date', '>', $today)->where('car_offers.status', 'active');
                    if(!empty($car_offer_data)) {
                        $flag = true;
                    }
                }
            }
            $car_brand_image = $record->car_brand->image;
            if(!empty($car_offers_var)) {
                $daily_price = floor($record->daily_price);
                $monthly_price = floor($record->monthly_price);
                $total_discount_price_daily_data = 0;
                $total_discount_price_monthly_data = 0;
                foreach ($car_offers_var as $index=>$car_offer) {
                    $car_offer_data = $car_offer->where('car_offers.offer_start_date', '<', $today)->where('car_offers.offer_end_date', '>', $today)->where('car_offers.status', 'active');
                    if(!empty($car_offer_data)) {
                        if($car_offer->offer_type == 'percentage') {
                            $discount_price = (float)$daily_price * (float)$car_offer->offer_value / 100;
                            $discount_month_price = (float)$monthly_price * (float)$car_offer->offer_value / 100;
                        }
                        else {
                            $discount_price = (float)$car_offer->offer_value;
                            $discount_month_price = (float)$car_offer->offer_value;
                        }
                        $total_discount_price_daily_data = $total_discount_price_daily_data + $discount_price;
                        $total_discount_price_monthly_data = $total_discount_price_monthly_data + $discount_month_price;
                    }
                }
                $daily_price = $daily_price - $total_discount_price_daily_data;
                $monthly_price = $monthly_price - $total_discount_price_monthly_data;
            }
            $del_daily_price = ($flag == true) ? 'AED '.floor($record->daily_price) : '';
            $offer_daily_price = ($flag == true) ? floor($daily_price) : floor($record->daily_price);
            $del_monthly_price = ($flag == true) ? 'AED '.floor($record->monthly_price) : '';
            $offer_monthly_price = ($flag == true) ? floor($monthly_price) : floor($record->monthly_price);
            $space = ($flag != true) ? '&nbsp;' : '';

            $html_inner .= '<div class="col-lg-4 col-md-6 col-12 latest_car_rental_sub_div">
                    <div class="most_rent_car">
                        <div class="rent_car_img">
                            <a href="car-details.php">
                                <img class="img-fluid" src="frontend/image/'. $record->car_images->first()->image . '" alt="' . $record->title . '">';

            if($flag == true) {
                $html_inner .= '<img class="img-fluid special_offer" src="assets/image/special_offer_tag.png" alt="">';
            }
            $html_inner .= '<p class="delivery_txt">Free Delivery</p>
                            </a>
                        </div>
                        <div class="most_rent_car_details">
                            <div class="car_full_details">
                                <div class="brand_name">
                                    <a href="#" class="text-decoration-none urus_fix"><h4>' . $record->name . '</h4></a>
                                    <img class="img-fluid" src="frontend/image/'. $car_brand_image. '" alt="">
                                </div>
                                <div class="rent_counts">
                                    <div class="rent_day">
                                        <p> <del>AED ' . $del_daily_price .'</del> ' . $space .'</p>
                                        <span>AED ' . $offer_daily_price .' <p>DAY</p> </span>
                                    </div>
                                    <div class="rent_day rent_month">
                                        <p> <del>AED ' . $del_monthly_price .'</del>  ' . $space .'</p>
                                        <span>AED  ' . $offer_daily_price .' <p>MONTH</p> </span>
                                    </div>
                                </div>';

            if(!empty($record->car_specifications)) {
                $car_specifications = $record->car_specifications->pluck('specification_title', 'specification_title');
                $door_text = '';
                $seat_text = '';
                $bag_text = '';
                foreach ($car_specifications as $car_specification) {
                    if(strpos($car_specification, 'Doors') !== false) {
                        $door_text = $car_specification;
                    }
                    if(strpos($car_specification, 'Seats') !== false) {
                        $seat_text = $car_specification;
                    }
                    if(strpos($car_specification, 'Bags') !== false) {
                        $bag_text = $car_specification;
                    }
                }
                $html_inner .= '<ul class="car_facilities">';

                if($door_text != '') {
                    $html_inner .= '<li> <img src="frontend/image/car_door.png" alt=""> '. $door_text . '</li>';
                }
                if($seat_text != '') {
                    $html_inner .= '<li> <img src="frontend/image/car_seats.png" alt=""> '. $seat_text . '</li>';
                }
                if($bag_text != '') {
                    $html_inner .= '<li> <img src="frontend/image/car_bags.png" alt=""> '. $bag_text . '</li>';
                }
                $html_inner .= '</ul>';
            }
            if(!empty($record->car_rent_details)) {
                $html_inner = '<div class="car_service">
                                    <ul>';
                foreach ($record->car_rent_details as $car_rent_detail) {
                    $html_inner .= '<li> <i class="fa-solid fa-circle-check rigth_icon"></i>' . $car_rent_detail->rent_detail_text .'</li>';
                 }
                $html_inner .= '</ul>
                                </div>';
            }
        $html_inner .=  '</div>
                            <div class="contact_info">
                                <a href="tel:+1234567899" class="call"><img class="img-fluid" src="frontend/image/call_info.png" alt=""></a>
                                <a href="https://wa.me/+1234567899" target="_blank"  class="whatsapp"><img class="img-fluid" src="frontend/image/whatsapp.png" alt=""></a>
                                <a href="msg_send" data-bs-toggle="modal" data-bs-target="#message_send"> <img class="img-fluid " src="frontend/image/message_send.png" alt=""> </a>
                            </div>
                        </div>
                    </div>
                </div>';

            $html .= $html_inner;
        }
        $data['html'] = $html;
        return response()->json($data);

    }
    public function car_detail($id)
    {
        $cars = Car::find($id);
        if(empty($cars)) {
            abort(404);
        }
        $car_arr = [];
        $car_arr['id'] = $cars->id;
        $car_arr['name'] = $cars->name;
        if(!empty($cars->car_images)) {
            $car_arr['image'] = $cars->car_images->first()->image;
        }
        else {
            $car_arr['image'] = NULL;
        }
        $car_rent_details = [];
        if(!empty($cars->car_rent_details)) {
            foreach ($cars->car_rent_details as $key=>$car_rent_detail) {
                $car_rent_details[$key] = $car_rent_detail->rent_detail_text;
            }
        }
        $car_arr['car_rent_details'] = $car_rent_details;
        $car_arr['dubai_phone_codes'] = dubai_phone_codes();
        $view = view("frontend.pages.models.car_inquiry_data")->render();
        return response()->json(['data' => $car_arr, "view" => $view]);
    }

    public function book_now(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required',
            'customer_email' => 'required|email:dns',
            // 'customer_phone_no' => 'required|size:15',
             'customer_phone_no' => 'required|max:20|regex:(\b[0-9]+)',
            'start_booking_date' =>'required|date_format:d/M/Y h:i a',
            'end_booking_date' =>'required|date_format:d/M/Y h:i a',
        ], [
            'customer_name.required' => __('text.customer_name_required'),
            'customer_email.required' => __('text.customer_email_required'),
            'customer_email.dns' => __('text.customer_email_dns'),
            'customer_email.email' => __('text.customer_email_email'),
            'start_booking_date.required' =>__('text.start_booking_date_required'),
            'start_booking_date.date' =>__('text.start_booking_date_date'),
            'end_booking_date.required' =>__('text.end_booking_date_required'),
            'end_booking_date.date' =>__('text.end_booking_date_date'),
            'customer_phone_no.required' => __('text.customer_phone_no_required'),
            'customer_phone_no.max' => __('text.customer_phone_no_digits'),
            'car_type_id.required' => __('text.email-plac'),
        ]);
        $validator->sometimes('start_booking_date', 'required', function($request) {
            if($request->flag == 'book_now' || $request->flag == 'inquiry'){
                return true;
            }
        });
        $validator->sometimes('end_booking_date', 'required', function($request) {
            if($request->flag == 'book_now' || $request->flag == 'inquiry'){
                return true;
            }
        });
        $validator->sometimes('car_type_id', 'required', function($request) {
            if($request->flag == 'book_now' ){
                return true;
            }
        });
        //error come
        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'message' => '',
                'errors' => $validator->errors()
            ]);
        }//success
        else {

            $data = $request->all();
            $data['start_booking_date'] = Carbon\Carbon::createFromFormat('d/M/Y h:i a', $data['start_booking_date'])->format('Y-m-d H:i');
            $data['end_booking_date'] = Carbon\Carbon::createFromFormat('d/M/Y h:i a', $data['end_booking_date'])->format('Y-m-d H:i');
            $data['customer_phone_no'] = str_replace(' ', '', $request->customer_phone_no);

                $car = Car::find($data['car_id']);
                if(!empty($car)) {
                    $data['car_type_id'] = $car->car_type_id;
                }
                $car_inquiry = CarInquiry::create($data);

                $car_type_title = '';
                if(!empty($car_inquiry->car) && !empty($car_inquiry->car->car_has_car_types) && count($car_inquiry->car->car_has_car_types) > 0) {
                    foreach($car_inquiry->car->car_has_car_types as $index=>$car_has_car_type) {
                        if($index != 0) {
                            $car_type_title .= ', ';
                        }
                        if(!empty($car_has_car_type->car_type)  && $car_has_car_type->car_type!= NULL && $car_has_car_type->car_type->translate(App::currentLocale())) {
                            $car_type_title .= $car_has_car_type->car_type->translate(App::currentLocale())->title;
                        }
                    }
                }
                $car_title = (!empty($car_inquiry->car)) ? $car_inquiry->car->name : '';
                if($request->flag == 'book_now') {
                    $success_message = 'Car has been booked successfully.';
                    $subject = "Car Book Detail";
                }
                else {
                    $success_message = 'Car inquiry has been sent successfully.';
                    $subject = "Car Inquiry Detail";
                }
                $email = Setting::where('section', 'header')->where('type', 'email')->first();
                if(!empty($email) && $email->translate('en')){
                    $data = $email->translate('en')->val;
                }
                else{
                    $data='';
                }

                if(!empty($data))
                {
                    Mail::to($data)->send(new CarBookNow($car_inquiry, $car_type_title,$car_title, $subject));
                }else{
                    Mail::to('test1@yopmail.com')->send(new CarBookNow($car_inquiry, $car_type_title,$car_title, $subject));
                }

                return response()->json([
                    'status' => 1,
                    'message' => $success_message,
                ]);
        }
    }
}
