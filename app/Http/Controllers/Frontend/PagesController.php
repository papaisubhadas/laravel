<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\CarBookNow;
use Modules\Article\Entities\Post;
use Modules\BannerSlideshow\Models\BannerSlideshow;
use Modules\Car\Models\Car;
use Modules\CarBrand\Models\CarBrand;
use Modules\CarInquiry\Models\CarInquiry;
use App\Models\CarOffer;
use Modules\CarType\Models\CarType;
use App\Models\Cms;
use App\Models\Country;
use App\Models\Setting;
use App\Models\Slider;
use Modules\Currency\Models\Currency;
use Modules\Testimonial\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\App;
use Modules\Deal\Models\Deal;
use Modules\Faq\Models\Faq;
use Modules\Faq\Models\FaqQaDetailTranslation;
use Modules\MostRentedCar\Models\MostRentedCar;
use Modules\Page\Models\Page;
use App\Models\ContactUs;
use Carbon;
use Illuminate\Support\Facades\Cache;


use Illuminate\Support\Str;
use Modules\Article\Events\PostViewed;

class PagesController extends Controller
{
    public $rowperpage = 9; // Number of rowperpage

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->get("page")){
            $page = $request->get("page");
            $most_rented_cars = getMostRentedCars($request, getMostRentedCarsLimit());
            $lastPage = $most_rented_cars->lastPage();
            $currentPage = $most_rented_cars->currentPage();
            $page = ($lastPage >= $currentPage) ? ($most_rented_cars->currentPage()+1) : 0;
            $view = view('frontend.pages.home.most_rented_cars_data',compact('page','most_rented_cars'))->render();
            return response()->json(['html' => $view, 'page'=>$page]);
        }
        $most_rented_cars = getMostRentedCars($request, getMostRentedCarsLimit());

        // if(!Cache::has('BannerSlideshow-'.app()->currentLocale())){
            Cache::remember('BannerSlideshow-'.app()->currentLocale(),1200,function(){
                return BannerSlideshow::leftjoin('banner_slideshow_translations', 'banner_slideshows.id', '=', 'banner_slideshow_translations.banner_slideshow_id')
                ->select('banner_slideshows.*', 'banner_slideshow_translations.title AS banner_slideshow_title')
                ->where('banner_slideshow_translations.locale', '=', App::currentLocale())
                ->orderBy('banner_slideshows.id', 'DESC')->where('banner_slideshows.status', 'active')->get();
            });
        // }

        $sliders = Cache::get('BannerSlideshow-'.app()->currentLocale());


        // if(!Cache::has('Deal-'.app()->currentLocale())){
            Cache::remember('Deal-'.app()->currentLocale(),1200,function(){
                return Deal::with('cars.translation')->active()->orderBy('id', 'desc')->get();
            });
        // }

        $deal_data = Cache::get('Deal-'.app()->currentLocale());

        // if(!Cache::has('Page-'.app()->currentLocale())){
            Cache::remember('Page-'.app()->currentLocale(),1200,function(){
                return  Page::with(['translation'])->where('type', 'section')->whereIn('slug', ['company-service', 'car-rent-rule', 'why-choose-us', 'about-us'])->where('status', 'active')->get();
            });
        // }

        $pages = Cache::get('Page-'.app()->currentLocale());
        $cms_section_company_service = $pages->where('slug', 'company-service')->first();
        $cms_section_car_rental_rule = $pages->where('slug', 'car-rent-rule')->first();
        $cms_section_why_choose_us = $pages->where('slug', 'why-choose-us')->first();
        $cms_section_about_us = $pages->where('slug', 'about-us')->first();

        // if(!Cache::has('Testimonials-'.app()->currentLocale())){
            Cache::remember('Testimonials-'.app()->currentLocale(),1200,function(){
                return  Testimonial::with(['translation'])->active()->take(5)->get();
            });
        // }

        // if(!Cache::has('averageReview-'.app()->currentLocale())){
            Cache::remember('averageReview-'.app()->currentLocale(),1200,function(){
                return  Testimonial::with(['translation'])->select(DB::raw('AVG(rating) as review_score, id'))->avg('rating');
            });
        // }

        //get testimonial data
        $testimonials = Cache::get('Testimonials-'.app()->currentLocale());
        $average_review = Cache::get('averageReview-'.app()->currentLocale());

        // if(!Cache::has('faq_details-'.app()->currentLocale())){
            Cache::remember('faq_details-'.app()->currentLocale(),1200,function(){
                return  Faq::leftjoin('faq_qa_details','faqs.id','=','faq_qa_details.faq_id')
                ->leftjoin('faq_qa_detail_translations','faq_qa_details.id','=','faq_qa_detail_translations.faq_qa_detail_id')
                ->select('faq_qa_detail_translations.*')
                ->where('faq_qa_detail_translations.locale','=',App::currentLocale())
                ->where('faqs.type','faq')
                ->get();
            });
        // }

        $faq_details = Cache::get('faq_details-'.app()->currentLocale());

        $dubai_phone_codes = dubai_phone_codes();

        return view('frontend.pages.home', compact('sliders', 'most_rented_cars', 'deal_data', 'cms_section_company_service', 'cms_section_car_rental_rule', 'cms_section_why_choose_us', 'cms_section_about_us', 'testimonials', 'average_review', 'faq_details', 'dubai_phone_codes'));
    }

    public function contactus(){
        return view('frontend.pages.contact-us');
    }

    public function contact_now(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required',
            'customer_email' => 'required|email:dns',
            'customer_phone_no' => 'required|max:15|regex:(\b[0-9]+)',

        ], [
            'customer_name.required' => __('text.customer_name_required'),
            'customer_email.required' => __('text.customer_email_required'),
            'customer_email.dns' => __('text.customer_email_dns'),
            'customer_email.email' => __('text.customer_email_email'),
            'customer_phone_no.required' => __('text.customer_phone_no_required'),
            'customer_phone_no.max' => __('text.customer_phone_no_digits'),
        ]);
        //error come
        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'message' => '',
                'errors' => $validator->errors(),
                'data' => [
                    'redirect' => route("frontend.contact-us")
                ]
            ]);
        }//success
        else {
            $data = $request->all();
            $contact_data = ContactUs::create($data);
            $success_message = 'Contact Now successfully.';
            $subject = "New Contact";
            $customer_name = $request->customer_name;
            $customer_email =$request->customer_email;
            $customer_phone_no = $request->customer_phone_no;
            $messages =$request->message;

            $mail_data = array(
                'customer_name' => $customer_name,
                'customer_phone_no' => $customer_phone_no,
                'customer_email' => $customer_email,
                'messages' => $messages,
            );
            $emails = Setting::where('section', 'header')->where('type', 'email')->first();
            if(!empty($emails) && $emails->translate('en')){
                $email = $emails->translate('en')->val;
            }
            else{
                    $email='';
            }
            if(!empty($email)){
                Mail::send('emails.contact-us-emaildata', $mail_data, function ($message) use ($customer_name,$email,$subject) {
                    $message->to($email, $customer_name)
                        ->subject( $subject);
                });
            }
            else{
                Mail::send('emails.contact-us-emaildata', $mail_data, function ($message) use ($customer_name,$email,$subject) {
                    $message->to('test1@yopmail.com', $customer_name)
                        ->subject( $subject);
                });
            }
            return response()->json([
                'status' => 1,
                'message' => $success_message,
                'data' => [
                    'redirect' => route("frontend.contact-us")
                ]
            ]);
        }
    }

    public function not_found()
    {
        abort(404);
    }
}
