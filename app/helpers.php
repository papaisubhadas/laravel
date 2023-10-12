<?php

use App\Models\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Car\Models\Car;
use Illuminate\Support\Facades\Log;
use Modules\CarType\Models\CarType;
use Modules\Faq\Models\Faq;
use App\Models\Setting;
use Goutte\Client;
use Illuminate\Support\Facades\File;
use Modules\Article\Entities\Post;
use Modules\MostRentedCar\Models\MostRentedCar;
//use Image;
/*
 * Global helpers file with misc functions.
 */

if (!function_exists('app_name')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function app_name()
    {
        return config('app.name');
    }
}

/*
 * Global helpers file with misc functions.
 */
if (!function_exists('user_registration')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function user_registration()
    {
        $user_registration = false;

        if (env('USER_REGISTRATION') == 'true') {
            $user_registration = true;
        }

        return $user_registration;
    }
}

/*
 *
 * label_case
 *
 * ------------------------------------------------------------------------
 */
if (!function_exists('label_case')) {
    /**
     * Prepare the Column Name for Lables.
     */
    function label_case($text)
    {
        $order = ['_', '-'];
        $replace = ' ';

        $new_text = trim(\Illuminate\Support\Str::title(str_replace('"', '', $text)));
        $new_text = trim(\Illuminate\Support\Str::title(str_replace($order, $replace, $text)));
        $new_text = preg_replace('!\s+!', ' ', $new_text);

        return $new_text;
    }
}

/*
 *
 * show_column_value
 *
 * ------------------------------------------------------------------------
 */
if (!function_exists('show_column_value')) {
    /**
     * Return Column values as Raw and formatted.
     *
     * @param string $valueObject Model Object
     * @param string $column Column Name
     * @param string $return_format Return Type
     * @return string Raw/Formatted Column Value
     */
    function show_column_value($valueObject, $column, $return_format = '')
    {
        $column_name = $column->Field;
        $column_type = $column->Type;

        $value = $valueObject->$column_name;

        if ($return_format == 'raw') {
            return $value;
        }

        if (($column_type == 'date') && $value != '') {
            $datetime = \Carbon\Carbon::parse($value);

            return $datetime->isoFormat('LL');
        } elseif (($column_type == 'datetime' || $column_type == 'timestamp') && $value != '') {
            $datetime = \Carbon\Carbon::parse($value);

            return $datetime->isoFormat('LLLL');
        } elseif ($column_type == 'json') {
            $return_text = json_encode($value);
        } elseif ($column_type != 'json' && \Illuminate\Support\Str::endsWith(strtolower($value), ['png', 'jpg', 'jpeg', 'gif', 'svg'])) {
            $img_path = asset($value);

            $return_text = '<figure class="figure">
                                <a href="' . $img_path . '" data-lightbox="image-set" data-title="Path: ' . $value . '">
                                    <img src="' . $img_path . '" style="max-width:200px;" class="figure-img img-fluid rounded img-thumbnail" alt="">
                                </a>
                                <figcaption class="figure-caption">Path: ' . $value . '</figcaption>
                            </figure>';
        } else {
            $return_text = $value;
        }

        return $return_text;
    }
}

/*
 *
 * fielf_required
 * Show a * if field is required
 *
 * ------------------------------------------------------------------------
 */
if (!function_exists('fielf_required')) {
    /**
     * Prepare the Column Name for Lables.
     */
    function fielf_required($required)
    {
        $return_text = '';

        if ($required != '') {
            $return_text = '<span class="text-danger">*</span>';
        }

        return $return_text;
    }
}

/*
 * Get or Set the Settings Values
 *
 * @var [type]
 */
/*if (! function_exists('setting')) {
    function setting($key, $default = null)
    {
        if (is_null($key)) {
            return new App\Models\Setting();
        }

        if (is_array($key)) {
            return App\Models\Setting::set($key[0], $key[1]);
        }

        $value = App\Models\Setting::get($key);

        return is_null($value) ? value($default) : $value;
    }
}*/

/*
 * Show Human readable file size
 *
 * @var [type]
 */
if (!function_exists('humanFilesize')) {
    function humanFilesize($size, $precision = 2)
    {
        $units = ['B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
        $step = 1024;
        $i = 0;

        while (($size / $step) > 0.9) {
            $size = $size / $step;
            $i++;
        }

        return round($size, $precision) . $units[$i];
    }
}

/*
 *
 * Encode Id to a Hashids\Hashids
 *
 * ------------------------------------------------------------------------
 */
if (!function_exists('encode_id')) {
    /**
     * Prepare the Column Name for Lables.
     */
    function encode_id($id)
    {
        $hashids = new Hashids\Hashids(config('app.salt'), 3, 'abcdefghijklmnopqrstuvwxyz1234567890');
        $hashid = $hashids->encode($id);

        return $hashid;
    }
}

/*
 *
 * Decode Id to a Hashids\Hashids
 *
 * ------------------------------------------------------------------------
 */
if (!function_exists('decode_id')) {
    /**
     * Prepare the Column Name for Lables.
     */
    function decode_id($hashid)
    {
        $hashids = new Hashids\Hashids(config('app.salt'), 3, 'abcdefghijklmnopqrstuvwxyz1234567890');
        $id = $hashids->decode($hashid);

        if (count($id)) {
            return $id[0];
        } else {
            abort(404);
        }
    }
}

/*
 *
 * Prepare a Slug for a given string
 * Laravel default str_slug does not work for Unicode
 *
 * ------------------------------------------------------------------------
 */
if (!function_exists('slug_format')) {
    /**
     * Format a string to Slug.
     */
    function slug_format($string)
    {
        $base_string = $string;

        $string = preg_replace('/\s+/u', '-', trim($string));
        $string = str_replace('/', '-', $string);
        $string = str_replace('\\', '-', $string);
        $string = strtolower($string);

        $slug_string = $string;

        return $slug_string;
    }
}

/*
 *
 * icon
 * A short and easy way to show icon fornts
 * Default value will be check icon from FontAwesome
 *
 * ------------------------------------------------------------------------
 */
if (!function_exists('icon')) {
    /**
     * Format a string to Slug.
     */
    function icon($string = 'fas fa-check')
    {
        $return_string = "<i class='" . $string . "'></i>";

        return $return_string;
    }
}

/*
 *
 * logUserAccess
 * Get current user's `name` and `id` and
 * log as debug data. Additional text can be added too.
 *
 * ------------------------------------------------------------------------
 */
if (!function_exists('logUserAccess')) {
    /**
     * Format a string to Slug.
     */
    function logUserAccess($text = '')
    {
        $auth_text = '';

        if (\Auth::check()) {
            $auth_text = 'User:' . \Auth::user()->name . ' (ID:' . \Auth::user()->id . ')';
        }

        \Log::debug(label_case($text) . " | $auth_text");
    }
}

/*
 *
 * bn2enNumber
 * Convert a Bengali number to English
 *
 * ------------------------------------------------------------------------
 */
if (!function_exists('bn2enNumber')) {
    /**
     * Prepare the Column Name for Lables.
     */
    function bn2enNumber($number)
    {
        $search_array = ['১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০'];
        $replace_array = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0'];

        $en_number = str_replace($search_array, $replace_array, $number);

        return $en_number;
    }
}

/*
 *
 * bn2enNumber
 * Convert a English number to Bengali
 *
 * ------------------------------------------------------------------------
 */
if (!function_exists('en2bnNumber')) {
    /**
     * Prepare the Column Name for Lables.
     */
    function en2bnNumber($number)
    {
        $search_array = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0'];
        $replace_array = ['১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০'];

        $bn_number = str_replace($search_array, $replace_array, $number);

        return $bn_number;
    }
}

/*
 *
 * bn2enNumber
 * Convert a English number to Bengali
 *
 * ------------------------------------------------------------------------
 */
if (!function_exists('en2bnDate')) {
    /**
     * Convert a English number to Bengali.
     */
    function en2bnDate($date)
    {
        // Convert numbers
        $search_array = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0'];
        $replace_array = ['১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০'];
        $bn_date = str_replace($search_array, $replace_array, $date);

        // Convert Short Week Day Names
        $search_array = ['Fri', 'Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu'];
        $replace_array = ['শুক্র', 'শনি', 'রবি', 'সোম', 'মঙ্গল', 'বুধ', 'বৃহঃ'];
        $bn_date = str_replace($search_array, $replace_array, $bn_date);

        // Convert Month Names
        $search_array = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $replace_array = ['জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগষ্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর'];
        $bn_date = str_replace($search_array, $replace_array, $bn_date);

        // Convert Short Month Names
        $search_array = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $replace_array = ['জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগষ্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর'];
        $bn_date = str_replace($search_array, $replace_array, $bn_date);

        // Convert AM-PM
        $search_array = ['am', 'pm', 'AM', 'PM'];
        $replace_array = ['পূর্বাহ্ন', 'অপরাহ্ন', 'পূর্বাহ্ন', 'অপরাহ্ন'];
        $bn_date = str_replace($search_array, $replace_array, $bn_date);

        return $bn_date;
    }
}

/*
 *
 * banglaDate
 * Get the Date of Bengali Calendar from the Gregorian Calendar
 * By default is will return the Today's Date
 *
 * ------------------------------------------------------------------------
 */
if (!function_exists('banglaDate')) {
    function banglaDate($date_input = '')
    {
        if ($date_input == '') {
            $date_input = date('Y-m-d');
        }

        $date_input = strtotime($date_input);

        $en_day = date('d', $date_input);
        $en_month = date('m', $date_input);
        $en_year = date('Y', $date_input);

        $bn_month_days = [30, 30, 30, 30, 31, 31, 31, 31, 31, 31, 29, 30];
        $bn_month_middate = [13, 12, 14, 13, 14, 14, 15, 15, 15, 16, 14, 14];
        $bn_months = ['পৌষ', 'মাঘ', 'ফাল্গুন', 'চৈত্র', 'বৈশাখ', 'জ্যৈষ্ঠ', 'আষাঢ়', 'শ্রাবণ', 'ভাদ্র', 'আশ্বিন', 'কার্তিক', 'অগ্রহায়ণ'];

        // Day & Month
        if ($en_day <= $bn_month_middate[$en_month - 1]) {
            $bn_day = $en_day + $bn_month_days[$en_month - 1] - $bn_month_middate[$en_month - 1];
            $bn_month = $bn_months[$en_month - 1];

            // Leap Year
            if (($en_year % 400 == 0 || ($en_year % 100 != 0 && $en_year % 4 == 0)) && $en_month == 3) {
                $bn_day += 1;
            }
        } else {
            $bn_day = $en_day - $bn_month_middate[$en_month - 1];
            $bn_month = $bn_months[$en_month % 12];
        }

        // Year
        $bn_year = $en_year - 593;
        if (($en_year < 4) || (($en_year == 4) && (($en_day < 14) || ($en_day == 14)))) {
            $bn_year -= 1;
        }

        $return_bn_date = $bn_day . ' ' . $bn_month . ' ' . $bn_year;
        $return_bn_date = en2bnNumber($return_bn_date);

        return $return_bn_date;
    }
}

/*
 *
 * Decode Id to a Hashids\Hashids
 *
 * ------------------------------------------------------------------------
 */
if (!function_exists('generate_rgb_code')) {
    /**
     * Prepare the Column Name for Lables.
     */
    function generate_rgb_code($opacity = '0.9')
    {
        $str = '';
        for ($i = 1; $i <= 3; $i++) {
            $num = mt_rand(0, 255);
            $str .= "$num,";
        }
        $str .= "$opacity,";
        $str = substr($str, 0, -1);

        return $str;
    }
}

/*
 *
 * Return Date with weekday
 *
 * ------------------------------------------------------------------------
 */
if (!function_exists('date_today')) {
    /**
     * Return Date with weekday.
     *
     * Carbon Locale will be considered here
     * Example:
     * শুক্রবার, ২৪ জুলাই ২০২০
     * Friday, July 24, 2020
     */
    function date_today()
    {
        $str = \Carbon\Carbon::now()->isoFormat('dddd, LL');

        return $str;
    }
}

if (!function_exists('language_direction')) {
    /**
     * return direction of languages.
     *
     * @return string
     */
    function language_direction($language = null)
    {
        if (empty($language)) {
            $language = app()->getLocale();
        }
        $language = strtolower(substr($language, 0, 2));
        $rtlLanguages = [
            'ar', //  'العربية', Arabic
            'arc', //  'ܐܪܡܝܐ', Aramaic
            'bcc', //  'بلوچی مکرانی', Southern Balochi
            'bqi', //  'بختياري', Bakthiari
            'ckb', //  'Soranî / کوردی', Sorani Kurdish
            'dv', //  'ދިވެހިބަސް', Dhivehi
            'fa', //  'فارسی', Persian
            'glk', //  'گیلکی', Gilaki
            'he', //  'עברית', Hebrew
            'lrc', //- 'لوری', Northern Luri
            'mzn', //  'مازِرونی', Mazanderani
            'pnb', //  'پنجابی', Western Punjabi
            'ps', //  'پښتو', Pashto
            'sd', //  'سنڌي', Sindhi
            'ug', //  'Uyghurche / ئۇيغۇرچە', Uyghur
            'ur', //  'اردو', Urdu
            'yi', //  'ייִדיש', Yiddish
        ];
        if (in_array($language, $rtlLanguages)) {
            return 'rtl';
        }

        return 'ltr';
    }
}
if (!function_exists('pr')) {
    function pr($content = null, $exit = 1)
    {
        if (is_array($content) || is_object($content)) {
            echo "<pre>";
            print_r($content);
        } else {
            echo $content;
        }
        if ($exit) {
            exit;
        }
    }
}
if (!function_exists('errorLog')) {
    function errorLog($exc, $url)
    {
        $stCurLogFileName = "error-" . date('Y-m-d') . '.txt';
        $fHandler = fopen(storage_path() . '/logs/' . $stCurLogFileName, 'a+');
        $fileContent = date("Y-m-d H:i:s") . "\n-------------------------------------------------\nURL : " . $url . "\nFILE  : " . $exc->getFile() . "\nLINE : " . $exc->getLine() . "\nMESSAGE: " . $exc->getMessage() . "\n";
        fwrite($fHandler, $fileContent);
        fclose($fHandler);
    }
}
if (!function_exists('product_block')) {
    function product_block($car)
    {

        $offerIconImage = $img = '';
        if (count($car->car_images) > 0) {
            $min = $car->car_images->min('position');
            $car_image_first = $car->car_images->where('position', $min)->first();
            if (!empty($car_image_first) && !empty($car_image_first->image)) {
                if (file_exists(public_path() . '/frontend/image/' . $car_image_first->image)) {
                    $img = asset('frontend/image/' . $car_image_first->image);
                }
            }
        }
        $car_offers_var = $car->car_offers;
        $today = date('Y-m-d');
        $flag = false;
        if (count($car_offers_var) > 0) {
            foreach ($car_offers_var as $car_offer) {
                $car_offer_data = $car_offer->where('car_offers.offer_start_date', '<', $today)->where('car_offers.offer_end_date', '>', $today)->where('car_offers.status', 'active')->count();
                if (!empty($car_offer_data)) {
                    $flag = true;
                    $offerIconImage = asset('frontend/image/special_offer_tag.png');
                }
            }
        }
        $car_brand_image = (!empty($car->car_brand)) ? $car->car_brand->image : '';
        $productName = ($car->translate(App::currentLocale())) ? $car->translate(App::currentLocale())->name : '';
        $inner_html = '<div class="col-lg-4 col-md-6 col-12">
              <div class="most_rent_car">';
        if (!empty($img)) {
            $inner_html .= '<div class="rent_car_img">
                  <a href="' . route('frontend.car_details', ['slug' => $car->slug]) . '">
                    <img class="img-fluid" src="' . $img . '" alt="">';
            if (isset($car->deals) && count($car->deals) > 0) {
                $inner_html .= '<img class="img-fluid special_offer" src="' . asset('frontend/image/special_offer_tag.png') . '" alt="Offer">';
            }
            $inner_html .= '<p class="delivery_txt">Free Delivery</p>
                  </a>
                </div>';
        }
        $inner_html .= '<div class="most_rent_car_details">
                  <div class="car_full_details">
                    <div class="brand_name">
                      <a href="' . route('frontend.car_details', ['slug' => $car->slug]) . '" class="text-decoration-none urus_fix">
                        <h4>' . $productName . '</h4>
                      </a>
                      <img class="img-fluid" src="' . asset('frontend/image/' . $car_brand_image) . '" alt="">
                    </div>';
        $inner_html .= '<div class="rent_counts">';
        $inner_html .= '<div class="rent_day">';
        $currency = Session::has('currency') ? Session::get('currency') : 'AED';
        $old_price = floor(Session::has('conversion_rate') ? $car->daily_price * Session::get('conversion_rate') : $car->daily_price);
        if (isset($car->deals) && count($car->deals) > 0) {
            foreach ($car->deals as $car_deal_data) {
                $deal_flag = 0;
                if (($car_deal_data->deal_type) == "daily") {
                    $deal_flag = 1;
                    $new_price = floor(Session::has('conversion_rate') ? $car_deal_data->pivot->connectedcar_value * Session::get('conversion_rate') : $car_deal_data->pivot->connectedcar_value);
                    $inner_html .= '<p><del>' . $currency . ' ' . $old_price . '</del></p>';
                    $inner_html .= '<span>' . $currency . ' ' . $new_price . '<p>Day</p> </span>';
                    break;
                } else {
                    $inner_html .= '<span>' . $currency . ' ' . $old_price . '<p>Day</p> </span>';
                    break;
                }
            }
        } else {
            $inner_html .= '<span>' . $currency . ' ' . $old_price . '<p>Day</p> </span>';
        }
        $inner_html .= '</div>';

        $inner_html .= '<div class="rent_day rent_month">';
        $old_price = floor(Session::has('conversion_rate') ? $car->monthly_price * Session::get('conversion_rate') : $car->monthly_price);
        if (isset($car->deals) && count($car->deals) > 0) {
            foreach ($car->deals as $car_deal_data) {
                $deal_flag = 0;
                if (($car_deal_data->deal_type) == "monthly") {
                    $deal_flag = 1;
                    $new_price = floor(Session::has('conversion_rate') ? $car_deal_data->pivot->connectedcar_value * Session::get('conversion_rate') : $car_deal_data->pivot->connectedcar_value);
                    $inner_html .= '<p><del>' . $currency . ' ' . $old_price . '</del></p>';
                    $inner_html .= '<span>' . $currency . ' ' . $new_price . '<p>Month</p> </span>';
                    break;
                } else {
                    $inner_html .= '<span>' . $currency . ' ' . $old_price . '<p>Month</p> </span>';
                    break;
                }
            }
        } else {
            $inner_html .= '<span>' . $currency . ' ' . $old_price . '<p>Month</p> </span>';
        }
        $inner_html .= '</div>';
        $inner_html .= '</div>';
        $inner_html .= '<ul class="car_facilities">';
        if (!empty($car->car_specifications) && count($car->car_specifications)) {
            foreach ($car->car_specifications as $key => $car_specification) {
                if ($key <= 2) {
                    $inner_html .= '<li>' . $car_specification->icon_html . ' ' . $car_specification->specification_title . '</li>';
                }
            }
        }
        $inner_html .= '</ul>';
        $inner_html .= '<div class="car_service">';
        if (!empty($car->car_rent_details)) {
            $inner_html .= '<ul>';
            foreach ($car->car_rent_details as $car_rent_detail) {
                if ($car_rent_detail->translate(App::currentLocale())) {
                    $detail = $car_rent_detail->translate(App::currentLocale()) ? $car_rent_detail->translate(App::currentLocale())->rent_detail_text : '';
                    $inner_html .= '<li><i class="fa-solid fa-circle-check rigth_icon"></i>' . $detail . '</li>';
                }
            }
            $inner_html .= '</ul>';
        }
        $inner_html .= '</div>';
        $phoneNo = (!empty(locale_whatsapp_number()) ? locale_whatsapp_number() : '');
        $inner_html .= '<div class="contact_info">
                    <a href="tel:' . $phoneNo . '" class="call">
                      <img class="img-fluid" src="' . asset('frontend/image/call_info.png') . '" alt="">
                    </a>
                    <a href="https://wa.me/' . $phoneNo . '" target="_blank" class="whatsapp">
                      <img class="img-fluid" src="' . asset('frontend/image/whatsapp.png') . '" alt="">
                    </a>
                    <a href="msg_send" class="msg_send" data-id="' . $car->id . '" data-bs-toggle="modal" data-bs-target="#message_send">Book Now</a>
                  </div>
                </div>
              </div>
            </div>
            </div>';
        return $inner_html;
    }
}

## returns most rented cars for home page, blog list page, blog details page, 404 page
if (!function_exists('getMostRentedCars')) {
    function getMostRentedCars($request, $limit = null)
    {
        /*---- Start Most Rent Car get As Order Wise----*/
        $most_rented_cars = [];
        $exist_car_id = [];
        // DB::enableQueryLog();
        $most_rented_car_model_data = MostRentedCar::orderBy('most_rent_car_display_order', 'asc');
        // if (!empty($limit)){
        //     $most_rented_car_model_data = $most_rented_car_model_data->take($limit);
        // }
        $most_rented_car_model_data = $most_rented_car_model_data->get()->pluck("mostrentablecar_id")->toArray();
        $most_rented_car_model_data_str = implode(",",$most_rented_car_model_data);
        $carData = Car::with([ "translation",
            "car_rent_details:id,car_id",'car_rent_details.translation',
            "deals",
            "car_offers"=>function($q){
                $q->where("offer_start_date","<",date('Y-m-d'))
                ->where("offer_end_date",">","date('Y-m-d')")
                ->where("status","active")->select("id","car_id","offer_start_date","offer_end_date","status","offer_type","offer_value");
            },
            "car_specifications:id,car_id,icon_html","car_specifications.translation",
            "car_images_first"=>function($q){
                $q->select("id","car_id","image","position");
            },
            "car_brand:id,image"
        ])
        ->whereHas('car_brand', function($q){
            $q->where('status', 'active');
        })
        ->select(["id","car_brand_id","car_type_id","slug","daily_price","monthly_price","weekly_price"])
        ->where('status', 'active')
        ->where('is_available', 'yes')
        ->whereIn('id', $most_rented_car_model_data)
        ->orderByRaw("FIELD(id, $most_rented_car_model_data_str) ASC");
        $carData = $carData->paginate($limit);
       // if($request->page){
        //     $carData = $carData->paginate($limit);
        // }else {
        //     $carData = $carData->get();
        // }
        return $carData;
        // foreach ($most_rented_car_model_data as $index => $most_rented_car_model) {
        //     $exist_car_id[$index] = $most_rented_car_model;
        //     $car_in_data = $carData->where('id',$most_rented_car_model)->first();
        //     if (!empty($car_in_data)) {
        //     $car_filter_data = $car_in_data->select('cars.*')
        //     ->leftJoin('car_brands', 'car_brands.id', '=', 'cars.car_brand_id')
        //     ->where('car_brands.status', 'active')
        //     ->where('cars.status', 'active')
        //     ->where('cars.is_available', 'yes')
        //     ->where('cars.id', $most_rented_car_model)->first();
        //         if (!empty($car_filter_data)) {
        //             $most_rented_cars[$index] = $car_filter_data;
        //         }
        //     }
        // }

        // return $most_rented_cars;
    }
}

function getMostRentedCarsLimit()
{
    return 6;
}

if (!function_exists('count_cars_by_brand')) {
    /**
     * Return total number of cars in brand
     *
     * @param integer $carBrandId car brand id.
     */
    function count_cars_by_brand($carBrandId)
    {
        return \Modules\Car\Models\Car::select('id')->where('car_brand_id', '=', $carBrandId)->where('cars.status', 'active')
        ->where('cars.is_available', 'yes')->count();
    }
}

if (!function_exists('get_locale_whatsapp_number')) {
    /**
     * Return whatsapp number based on app current locale language
     *
     */
    function get_locale_whatsapp_number()
    {
        // get current locale
        // $app_current_locale = ((array_key_exists(\App::currentLocale(), app()->config->get('app.available_locales'))) ? \App::currentLocale() : \Config::get('app.fallback_locale'));
        $locale_whatsapp_number_model_data = \App\Models\Setting::with(['translation'])->where('type', 'whatsapp_number')->where('section', 'whatsapp_section')->first();
        // $locale_whatsapp_number_model_data->translation = $locale_whatsapp_number_model_data->translations[0] ?? null;
        // $current_locale_whatsapp_number = !empty($locale_whatsapp_number_model_data) ? $locale_whatsapp_number_model_data->translate($app_current_locale)->val : null;
        $current_locale_whatsapp_number = (!empty($locale_whatsapp_number_model_data->translation->val) ? $locale_whatsapp_number_model_data->translation->val : '');
        return $current_locale_whatsapp_number;
    }
}

if (!function_exists('get_breadcrumb_for_car_details')) {
    /**
     * Return breadcrumb for car details page
     *
     * @param array $car car details.
     */
    function get_breadcrumb_for_car_details($car)
    {
        $previousRouteName = \Route::getRoutes()->match(
            \Request::create(url()->previous())
        )->getName();

        // get current locale
        $previousURL = url()->previous();
        $app_current_locale = ((array_key_exists(\App::currentLocale(), app()->config->get('app.available_locales'))) ? \App::currentLocale() : \Config::get('app.fallback_locale'));

        if (Route::currentRouteName() == 'frontend.car_details') {
            if (session()->has('car_breadcrumb_previous_route')) {
                $previousRouteName = session()->get('car_breadcrumb_previous_route');
                session()->forget('car_breadcrumb_previous_route');
            }
        }

        $previousURLSegment = explode('/', $previousURL);
        $lastURLSegment = end($previousURLSegment);

        $car['title'] = $car->custom_title;
        $car['slug'] = $car->slug;

        if ($previousRouteName == 'frontend.deals.get_deal_by_type') {
            $deal['slug'] = $lastURLSegment;
            return Breadcrumbs::render('deal_car', $deal, $car);
        } else if ($previousRouteName == 'frontend.car_brand_details') {
            $car_brand['slug'] = $car->car_brand->slug;
            $car_brand['title'] = $car->car_brand->translate($app_current_locale)->title;
            return Breadcrumbs::render('brand_car', $car_brand, $car);
        } else if ($previousRouteName == 'frontend.car_type_details') {
            $car_type_details = CarType::select('car_type_translations.title', 'car_types.slug')->leftJoin('car_type_translations', 'car_types.id', '=', 'car_type_translations.car_type_id')->where([
                ['car_types.slug', '=', $lastURLSegment],
                ['car_type_translations.locale', '=', App::currentLocale()]
            ])->first();
            $car_type['slug'] = $car_type_details->slug;
            $car_type['title'] = $car_type_details->title;
            return Breadcrumbs::render('type_car', $car_type, $car);
        } else if ($previousRouteName  == 'frontend.posts.blogs') {
            return Breadcrumbs::render('blog_car', $car);
        } else if ($previousRouteName == 'frontend.posts.blog_details') {
            $blog_details = \Modules\Article\Entities\Post::where('slug', $lastURLSegment)->first();
            $blog['slug'] = $blog_details->slug;
            $blog['title'] = $blog_details->name;
            return Breadcrumbs::render('blog_details_car', $blog, $car);
        } else if ($previousRouteName == 'frontend.404') {
            return Breadcrumbs::render('404_car', $car);
        } else {
            return Breadcrumbs::render('car_details_home', $car);
        }
    }
}

function get_route_prefix()
{
    $set_prefix = '/';
    if(array_key_exists(\Request::segment(1),app()->config->get('app.available_locales')))
    {
        $set_prefix = \Request::segment(1);
    }
    return $set_prefix;
}
//JM vpn
//feauture image
if (!function_exists('feature_image')) {
    function feature_image($type = null, $title = null, $unlinkImage=null)
    {
        if ($type == 'Car') {
            $path = 'frontend/Feature/Car';
        } else if ($type == 'CarType') {
            $path = 'frontend/Feature/CarType';
        } else if ($type == 'CarBrand') {
            $path = 'frontend/Feature/CarBrand';
        } else if ($type == 'Deal') {
            $path = 'frontend/Feature/Deal';
        }

        if (request()->file('meta_image_en')) {
            $image = request()->file('meta_image_en');
            // $imageNane = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            // $ext = $image->getClientOriginalExtension();
            // $imageNewName = time() . ' ' . $imageNane;
            // if($title != null){
            //     $imageNewName = time() . ' ' . $title;
            // }
            // $imageName_en = str()->slug($imageNewName).'.'.$ext;
            // $destinationPath = $path;
            // $image->move($destinationPath, $imageName_en);
            // $image_en = $imageName_en;
            $image_en = uploadImage($path, $image, $title, $unlinkImage,true);
        }
        if (request()->file('meta_image_ar')) {
            $image = request()->file('meta_image_ar');
            // $imageNane = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            // $ext = $image->getClientOriginalExtension();
            // $imageNewName = time() . ' ' . $imageNane;
            // if($title != null){
            //     $imageNewName = time() . ' ' . $title;
            // }
            // $imageName_ar = str()->slug($imageNewName).'.'.$ext;
            // $destinationPath = $path;
            // $image->move($destinationPath, $imageName_ar);
            // $image_ar = $imageName_ar;
            $image_ar = uploadImage($path, $image, $title, $unlinkImage,true);
        }
        if (request()->file('meta_image_fr')) {
            $image = request()->file('meta_image_fr');
            // $imageNane = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            // $ext = $image->getClientOriginalExtension();
            // $imageNewName = time() . ' ' . $imageNane;
            // if($title != null){
            //     $imageNewName = time() . ' ' . $title;
            // }
            // $imageName_fr = str()->slug($imageNewName).'.'.$ext;
            // $destinationPath = $path;
            // $image->move($destinationPath, $imageName_fr);
            // $image_fr = $imageName_fr;
            $image_fr = uploadImage($path, $image, $title, $unlinkImage,true);
        }
        if (request()->file('meta_image_ru')) {
            $image = request()->file('meta_image_ru');
            // $imageNane = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            // $ext = $image->getClientOriginalExtension();
            // $imageNewName = time() . ' ' . $imageNane;
            // if($title != null){
            //     $imageNewName = time() . ' ' . $title;
            // }
            // $imageName_ru = str()->slug($imageNewName).'.'.$ext;
            // $destinationPath = $path;
            // $image->move($destinationPath, $imageName_ru);
            // $image_ru = $imageName_ru;
            $image_ru = uploadImage($path, $image, $title, $unlinkImage,true);
        }
        return array(
            'image_en' => !empty($image_en)  ?   $image_en  : '',
            'image_ar' => !empty($image_ar)  ?   $image_ar  : '',
            'image_fr' => !empty($image_fr)  ?   $image_fr  : '',
            'image_ru' => !empty($image_ru)  ?   $image_ru  : '',
        );
    }
}

if (!function_exists('get_locale_contact_number')) {
    function get_locale_contact_number()
    {
        $phone_no = \App\Models\Setting::where('type', 'phone_no')->where('section', 'footer')->first();
        $deafult_mobile = (!empty($phone_no->translate('en')->val) ? $phone_no->translate('en')->val : '');
        $app_current_locale = ((array_key_exists(\App::currentLocale(), app()->config->get('app.available_locales'))) ? \App::currentLocale() : \Config::get('app.fallback_locale'));
        switch ($app_current_locale) {
            case 'fr':
                $mobile = '+971503443308';
                break;
            default:
                $mobile = $deafult_mobile;
                break;
        }
        return $mobile;
    }
}

if (!function_exists('dubai_phone_codes')) {
    function dubai_phone_codes()
    {
        return Country::where('iso', 'AE')->first();
    }
}

//  add new code
if(!function_exists('home_page_schema')){
    function home_page_schema(){

        $homePageScehma=[];
        $all_settings = \App\Models\Setting::with(['translation'])->get(["id", "type", "section"]);
        /* settings_footer */
        $settings_footer = $all_settings->where('section', 'footer')->mapWithKeys(function($data){
            $data->translation = !$data->translation ? $data->translations[0] : $data->translation;
            if($data->type == 'address'){
                return [$data->translation->name => $data];
            }
            return [$data->translation->name => $data->translation->val ?? $data->val];
        });
        $settings_common = $all_settings->where('section', 'common')->mapWithKeys(function($data){
            $data->translation = !$data->translation ? $data->translations[0] : $data->translation;
            return [$data->translation->name => $data];
        });
        $local_business_object=[];
        if(!empty($settings_footer) || !empty($settings_common)) {
            $local_business_object = [
                "@type" => "LocalBusiness",
                "name" => config("app.name"),
                "url" => config("app.url"),
                "sameAs" => !empty($settings_footer) ? [
                    $settings_footer["facebook_url"],
                    $settings_footer["instagram_url"],
                    $settings_footer["twitter_url"],
                    $settings_footer["snapchat_url"],
                    $settings_footer["linkedin_url"],
                    $settings_footer["youtube_url"],
                    $settings_footer["embeded_map_url"]
                ] : "",
                "logo" => asset("frontend/image/" . $settings_footer["logo"]),
                "image" => asset("frontend/image/" . $settings_footer["logo"]),
                "description" => $settings_common["meta_desciption"]->val,
                "address" => [
                    "@type" => "PostalAddress",
                    "streetAddress" => $settings_footer["address"]->val,
                    "addressLocality" => "Dubai",
                    "addressRegion" => "Dubai",
                    "postalCode" => "89028",
                    "addressCountry" => "United Arab Emirates"
                ],
                "geo" => [
                    "@type" => "GeoCoordinates",
                    "latitude" => "25.20351",
                    "longitude" => "55.27806"
                ],
                "hasMap" => "https://goo.gl/maps/3BU3kinjtyrZmCkM9",
                "telephone" => $settings_footer["phone_no"]
            ];
        }
        $image_object=[];

        $feature_image =Setting::where('section', 'common')->where('type','feature_image')->first();
        $fea_image = '';
        $width = '';
        $height ='';

        if(!empty($feature_image->val) && file_exists(public_path('frontend/image/'.$feature_image->val))){
            $fea_image=getimagesize(public_path('frontend/image/'.$feature_image->val));
            $width = $fea_image[0];
            $height = $fea_image[1];
        }
        $image_object=[
            "@type"=> "ImageObject",
            "@id"=> config("app.url")."#primaryimage",
            "inLanguage"=>  app()->getLocale(),
            "url"=> !empty($feature_image->val) ? asset("frontend/image/".$feature_image->val) : "",
            "width"=>$width,
            "height"=>$height,
            "caption"=> "Cheap Car Rental Dubai"
        ];
        $faqschemaMarkup=[];

        $faq_details = Faq::with(['faq_qa_details' => function ($query) {
            $query->with('faq_qa_detail_translations')->whereHas('faq_qa_detail_translations', function ($subquery) {
                $subquery->where('locale', '=', App::currentLocale());
            });
        }])
        ->where('faqs.type', 'faq')
        ->get();

        $faqObject = [];
        foreach ($faq_details as $faq_detail) {
            foreach ($faq_detail->faq_qa_details as $faq) {
                $faqObject[] = [
                    "@type"=> "Question",
                    "name"=> $faq->question,
                    "acceptedAnswer"=>[
                        "@type"=> "Answer",
                        'text' => $faq->answer
                    ]
                ];
            }
            $faqschemaMarkup = [
                '@context' => 'http://schema.org',
                '@type' => 'FAQPage',
                "mainEntity"=> $faqObject
            ];
        }
        $graphs = [
            $faqschemaMarkup,
            $image_object
        ];
        if(count($local_business_object)){
            $graphs = array_merge([$local_business_object],$graphs);
        }
        $homePageScehma = [
            "@context" => "http://schema.org",
            "@graph"=> $graphs

        ];

        $home_page_encode =json_encode($homePageScehma,JSON_UNESCAPED_SLASHES);
        echo $home_page_encode;
    }
}

if(!function_exists('faq_page_schema')){
    function faq_page_schema(){
        $faqschemaMarkup=[];

        $faq_details = Faq::with(['faq_qa_details' => function ($query) {
            $query->with('faq_qa_detail_translations')->whereHas('faq_qa_detail_translations', function ($subquery) {
                $subquery->where('locale', '=', App::currentLocale());
            });
        }])
        ->where('faqs.type', 'faq')
        ->get();

        $faqObject = [];
        foreach ($faq_details as $faq_detail) {
            foreach ($faq_detail->faq_qa_details as $faq) {
            $faqObject[] = [
                "@type"=> "Question",
                "name"=> $faq->question,
                "acceptedAnswer"=>[
                    "@type"=> "Answer",
                    'text' => $faq->answer
                ]
            ];
            }

            $faqschemaMarkup = [
                '@context' => 'http://schema.org',
                '@type' => 'FAQPage',
                "mainEntity"=> $faqObject
            ];
        }
        $faqencodedSchema =json_encode($faqschemaMarkup,JSON_UNESCAPED_SLASHES);
        echo $faqencodedSchema;
    }
}
if(!function_exists('car_type_schema')){
    function car_type_schema($car_type,$from=null){
        $carTypechemaMarkup=[];

        $faq_details = Faq::with(['faq_qa_details' => function ($query) {
            $query->with('faq_qa_detail_translations')->whereHas('faq_qa_detail_translations', function ($subquery) {
                $subquery->where('locale', '=', App::currentLocale());
            });
        }])
        ->where('faqs.reference_id',$car_type->id)
        ->where('faqs.type', 'car-type')
        ->get();

        $faqObject = [];
        $faq_schema=[];
        foreach ($faq_details as $faq_detail) {
            foreach ($faq_detail->faq_qa_details as $faq) {
            $faqObject[] = [

                "@type"=> "Question",
                "name"=> $faq->question,
                "acceptedAnswer"=>[
                    "@type"=> "Answer",
                    'text' => $faq->answer
                ]
            ];
            }
            $faq_schema = [
                '@type' => 'FAQPage',
                "mainEntity"=> $faqObject
            ];
        }

        $breadcrumbsObject=[
            "@type"=> "BreadcrumbList",
            "itemListElement"=> [
                [
                    "@type"=> "ListItem",
                    "position"=> 1,
                    "item"=> [
                        "@id"=>  config('app.url'),
                        "name"=> "Rent a car"
                    ]
                ],
                [
                    "@type"=> "ListItem",
                    "position"=> 2,
                    "item"=> [
                        "@id"=> Request::url(),
                        "name"=> $car_type->title,
                    ]
                ],
            ]
        ];
        $cars_details=null;
        $currency = Session::has('currency') ? Session::get('currency') : 'AED';
        if(!empty($car_type)) {
                $cars_details = Car::with(['car_translation'=>function($c){
                                $c->where('locale','=',App::currentLocale());
                        },'car_has_car_types','car_translation','car_brand','car_images'])
                ->where('cars.status', 'active')
                ->where('cars.is_available', 'yes')
                ->whereHas('car_has_car_types', function ($q) use ($car_type) {
                    $q->where('car_type_id', '=', $car_type->id);
                })
                ->groupBy('cars.id')
                ->get();
        }
        $productObject = [];
        foreach ($cars_details as $car_dtl) {
            if(count($car_dtl->car_images) > 0) {
                $min = $car_dtl->car_images->min('position');
                $car_image_first = $car_dtl->car_images->where('position', $min)->first();

                $image='';
                if(!empty($car_image_first)&& !empty($car_image_first->image)){
                    if(file_exists(public_path().'/frontend/image/'.$car_image_first->image)){
                        $image =asset('/frontend/image/'.$car_image_first->image);
                    }
                }
            }
            $car_brand_title = (!empty($car_dtl->car_brand)) ?$car_dtl->car_brand->title : '';

            if($car_dtl->is_available =='yes'){
                $stock="http://schema.org/InStock";
            }
            else{
                $stock="http://schema.org/OutofStock";
            }
            $description = $car_dtl->car_translation[0]->meta_description;

            $previousURLSegment = config('app.url').'cars/'.$car_dtl->slug;

            $productObject[] = [
                "@type"=> "Product",
                "name"=> $car_dtl->name,
                "image"=> $image,
                "description"=> !empty($description) ?  $description   : null,
                "sku"=>$car_dtl->slug,
                "brand"=> [
                    "@type"=> "Brand",
                    "name"=>  $car_brand_title,
                ],
                "offers"=> [
                    [
                        "@type"=> "Offer",
                        "name"=>"Daily",
                        "price"=> $car_dtl->daily_price,
                        "priceCurrency"=>  $currency,
                        "availability"=>  $stock,
                        "url"=> $previousURLSegment,

                    ],
                    [
                        "@type"=> "Offer",
                        "name"=>"Monthly",
                        "price"=> $car_dtl->monthly_price,
                        "priceCurrency"=> $currency,
                        "availability"=>  $stock,
                        "url"=>$previousURLSegment,
                    ]
                ]
            ];

        }
        $carTypechemaMarkup = [
            '@context' => 'http://schema.org',
            "@graph"=> [ $breadcrumbsObject,$faq_schema,$productObject],
        ];

        $car_type_encodedschema =json_encode($carTypechemaMarkup,JSON_UNESCAPED_SLASHES);

        if($from){
            return $car_type_encodedschema;
        }else{
            echo $car_type_encodedschema;
        }

    }
}
if(!function_exists('car_brand_schema')){
    function car_brand_schema($car_brand,$from=null){
        $carBrandchemaMarkup=[];
        $faq_schema=[];

        $faq_details = Faq::with(['faq_qa_details' => function ($query) {
            $query->with('faq_qa_detail_translations')->whereHas('faq_qa_detail_translations', function ($subquery) {
                $subquery->where('locale', '=', App::currentLocale());
            });
        }])
        ->where('faqs.reference_id',$car_brand->id)
        ->where('faqs.type', 'car-brand')
        ->get();

        $faqObject = [];
        foreach ($faq_details as $faq_detail) {
            foreach ($faq_detail->faq_qa_details as $faq) {
            $faqObject[] = [

                "@type"=> "Question",
                "name"=> $faq->question,
                "acceptedAnswer"=>[
                    "@type"=> "Answer",
                    'text' => $faq->answer
                ]
            ];
            }
            $faq_schema = [
                '@type' => 'FAQPage',
                "mainEntity"=> $faqObject
            ];
        }
        $breadcrumbsObject=[];
        $breadcrumbsObject=[
            "@type"=> "BreadcrumbList",
            "itemListElement"=> [
                [
                    "@type"=> "ListItem",
                    "position"=> 1,
                    "item"=> [
                        "@id"=>  config('app.url'),
                        "name"=> "Rent a car"
                    ]
                ],
                [
                    "@type"=> "ListItem",
                    "position"=> 2,
                    "item"=> [
                        "@id"=> Request::url(),
                        "name"=> $car_brand->title,
                    ]
                ],
            ]
        ];

        $cars_details=null;
        $currency = Session::has('currency') ? Session::get('currency') : 'AED';
        if(!empty($car_brand)) {

                $cars_details = Car::with(['car_translation'=>function($c){
                    $c->where('locale','=',App::currentLocale());
                            },'car_has_car_types','car_translation','car_brand','car_images'])
                    ->where('cars.status', 'active')
                    ->where('cars.is_available', 'yes')
                    ->where('cars.car_brand_id', '=', $car_brand->id)
                    ->groupBy('cars.id')
                    ->get();
        }
        $productObject = [];
        foreach ($cars_details as $car_dtl) {
            $min = $car_dtl->car_images->min('position');
            $car_image_first = $car_dtl->car_images->where('position', $min)->first();

            if($car_dtl->is_available =='yes'){
                $stock="http://schema.org/InStock";
            }
            else{
                $stock="http://schema.org/OutofStock";
            }
            $description = $car_dtl->car_translation[0]->meta_description;
            $previousURLSegment = config('app.url').'cars/'.$car_dtl->slug;

            $image='';
            if(!empty($car_image_first)&& !empty($car_image_first->image)){
                if(file_exists(public_path().'/frontend/image/'.$car_image_first->image)){
                    $image =asset('/frontend/image/'.$car_image_first->image);
                }
            }
            $car_brand_title = (!empty($car_dtl->car_brand)) ?$car_dtl->car_brand->title : '';

            $productObject[] = [
                "@type"=> "Product",
                "name"=> $car_dtl->name,
                "image"=>$image,
                "description"=> !empty($description) ?  $description   : null,
                "sku"=>$car_dtl->slug,
                "brand"=> [
                    "@type"=> "Brand",
                    "name"=>  $car_brand_title,
                ],
                "offers"=> [
                    [
                        "@type"=> "Offer",
                        "name"=>"Daily",
                        "price"=> $car_dtl->daily_price,
                        "priceCurrency"=>  $currency,
                        "availability"=>  $stock,
                        "url"=> $previousURLSegment,

                    ],
                    [
                        "@type"=> "Offer",
                        "name"=>"Monthly",
                        "price"=> $car_dtl->monthly_price,
                        "priceCurrency"=> $currency,
                        "availability"=>  $stock,
                        "url"=>$previousURLSegment,

                    ]
                ]

            ];
        }
        $carBrandchemaMarkup = [
            '@context' => 'http://schema.org',
            "@graph"=> [ $breadcrumbsObject,$faq_schema,$productObject],
        ];

        $car_brand_encodedschema =json_encode($carBrandchemaMarkup,JSON_UNESCAPED_SLASHES);
        if($from){
            return $car_brand_encodedschema;
        }else{
            echo $car_brand_encodedschema;
        }
    }
}

if(!function_exists('car_detail_schema')){
    function car_detail_schema($cars,$from=null){
        $breadcrumbsObject=[];
        $breadcrumb_car['title'] = $cars->name;
        $breadcrumb_car['slug'] = $cars->slug;
        $breadcrumbs=Breadcrumbs::render('brand_car',array('slug' => $cars->car_brand->slug, 'title' => $cars->car_brand->title), $breadcrumb_car);

        foreach ($breadcrumbs->breadcrumbs as $key=>$bread) {
            $breadcrumbsObject[]=[
                    "@type"=> "ListItem",
                    "position"=> ++$key,
                    "name"=>$bread->title,
                    "item"=> [
                        "type"=>'Thing',
                        "@id"=> $bread->url
                    ]
            ];
        }
        $breadcrumbs_schema = [
            '@type' => 'BreadcrumbList',
            "itemListElement"=>[
             $breadcrumbsObject
            ],
        ];
        $faq_schema=[];

        $faq_details = Faq::with(['faq_qa_details' => function ($query) {
            $query->with('faq_qa_detail_translations')->whereHas('faq_qa_detail_translations', function ($subquery) {
                $subquery->where('locale', '=', App::currentLocale());
            });
        }])
        ->where('faqs.reference_id',$cars->id)
        ->where('faqs.type', 'car')
        ->get();

        $faqObject = [];
        foreach ($faq_details as $faq_detail) {
            foreach ($faq_detail->faq_qa_details as $faq) {
            $faqObject[] = [

                "@type"=> "Question",
                "name"=> $faq->question,
                "acceptedAnswer"=>[
                    "@type"=> "Answer",
                    'text' => $faq->answer
                ]
            ];
            }
            $faq_schema = [
                '@type' => 'FAQPage',
                "mainEntity"=> $faqObject
            ];
        }
        $settings_header=null;
        $all_settings = \App\Models\Setting::get(["id", "type", "section"]);

        $settings_header = $all_settings->where('section', 'header')->mapWithKeys(function($data){
            $data->translation = !$data->translation ? $data->translations[0] : $data->translation;

            return [$data->translation->name => $data];
        });

        $cars_details=null;
        $currency = Session::has('currency') ? Session::get('currency') : 'AED';
        if(!empty($cars)) {

            $cars_details = Car::with(['car_brand.car_brand_translation'=>function($c){
                                    $c->where('locale','=',App::currentLocale());
                            },'car_images','car_translation'=>function($c){
                                $c->where('locale','=',App::currentLocale());
                        },'car_images_first'])
                    ->where('cars.status', 'active')
                    ->where('cars.id', '=', $cars->id)
                    ->groupBy('cars.id')
                    ->first();

        }
        $productObject = [];
        $car_images='';
        if(count($cars->car_images) > 0) {
            $car_images = \Modules\Car\Models\CarImage::where('car_id', $cars->id)->orderBy('position', 'asc')->get();
        }
        if($cars_details->is_available =='yes'){
            $stock="http://schema.org/InStock";
        }
        else{
            $stock="http://schema.org/OutofStock";
        }
        if(!empty($settings_header['logo'])){
            $logo =  asset("frontend/image/" . $settings_header["logo"]->val);
        }
        else{
            $logo = '';
        }

        $description = $cars_details->car_translation[0]->meta_description;
        $previousURLSegment = config('app.url').'cars/'.$cars_details->slug;

        $first_car_image = !empty($cars_details->car_images_first)  ? $cars_details->car_images_first : '';
        $first_image = '';
        if(!empty($first_car_image) && !empty($first_car_image->image)) {
            if (file_exists(public_path() . '/frontend/image/' . $first_car_image->image)) {
                $first_image = asset('frontend/image/' . $first_car_image->image);
            }
        }

        $productObject = [
            "@type"=> "Product",
            "name" => $cars_details->custom_title,
            "image" => $first_image,
            "imageObject" => [],
            "description"=> !empty($description) ?  $description   : null,
            "logo"=> $logo,
            "brand"=> [
                "@type"=> "Brand",
                "name"=>$cars_details->car_brand->car_brand_translation[0]['title'],
            ],
            "offers"=> [
                !empty($cars_details->daily_price) ? [
                    "@type"=> "Offer",
                    "name"=>"Daily",
                    "availability"=> $stock,
                    "priceCurrency"=>  $currency,
                    "price"=> $cars_details->daily_price,
                ] : null,
                !empty($cars_details->monthly_price) ? [
                    "@type" => "Offer",
                    "name" => "Monthly",
                    "availability"=> $stock,
                    "priceCurrency" => $currency,
                    "price" => $cars_details->monthly_price,

                ] : null,
            ],
        ];
        foreach ($car_images as $car_dtl) {
            $car_image = '';
            if(!empty($car_dtl->image) && !empty($car_dtl->image)) {
                if (file_exists(public_path() . '/frontend/image/' . $car_dtl->image)) {
                    $car_image = asset('frontend/image/' . $car_dtl->image);
                }
            }
            $imageObject = [
                "name" => $cars_details->name,
                "image" => $car_image,
            ];
            $productObject["imageObject"][] = $imageObject; // Add the image object to the images array
        }
        $carDetailchemaMarkup = [
            '@context' => 'http://schema.org',
            "@graph"=> [
              $breadcrumbs_schema, $faq_schema, $productObject
            ],
        ];
        $breadcrumbs_encodeschema =json_encode($carDetailchemaMarkup,JSON_UNESCAPED_SLASHES);

        if($from){
            return $breadcrumbs_encodeschema;
        }else{
            echo $breadcrumbs_encodeschema;
        }
    }
}
if(!function_exists('blog_article_schema')){
    function blog_article_schema($blog,$from=null){

        $feature_image = !empty($blog)  ? $blog->feature_image : '';
        $fea_image = $width =  $height ='';

        $blog_fea_image = '';
            if(!empty($feature_image)) {
                if (file_exists(public_path() . '/frontend/posts/' . $feature_image)) {
                    $fea_image=getimagesize(public_path('/frontend/posts/' . $feature_image));
                    $width = $fea_image[0];
                    $height = $fea_image[1];
                    $blog_fea_image = asset('frontend/posts/' . $feature_image);
                }
            }
        if(!empty($blog->published_at)){
            $published_date =$blog->published_at->toDateTimeString();
        }
        else{
            $published_date=null;
        }
        if(!empty($blog->updated_at)){
            $updated_date =$blog->updated_at->toDateTimeString();

        }
        else{
            $updated_date=null;
        }

        $productObject=[];
        $settings_footer=null;

        $all_settings = \App\Models\Setting::get(["id", "type", "section"]);
        $settings_footer = $all_settings->where('section', 'footer')->mapWithKeys(function($data){
            $data->translation = !$data->translation ? $data->translations[0] : $data->translation;
            if($data->type == 'address'){
                return [$data->translation->name => $data];
            }
            return [$data->translation->name => $data->translation->val ?? $data->val];
        });
        $settings_header = $all_settings->where('section', 'header')->mapWithKeys(function($data){
            $data->translation = !$data->translation ? $data->translations[0] : $data->translation;
            return [$data->translation->name => $data];
        });
        if(!empty($settings_header['logo'])){
            $logo =  asset("frontend/image/".$settings_header['logo']->val);
        }
        else{
            $logo = '';
        }
        $productObject = [
            '@context' => 'http://schema.org',
            "@type"=> "Article",
            "@id"=>  Request::url().'#schema-7356',
            "headline"=>$blog->meta_title,
            "datePublished"=>$published_date,
            "dateModified"=>$updated_date,
            "name"=>$blog->meta_title,
            "inLanguage"=>app()->getLocale(),
            "author"=>[
                "@type" =>"Person",
                "name"=>$blog->created_by_name
            ],
            "isPartOf"=>[
                "@type"=>"WebPage",
                "@id"=>  Request::url().'#webpage',
                "url"=> Request::url(),
                "name"=>$blog->meta_title,
                "datePublished"=>$published_date,
                "dateModified"=>$updated_date,
                "inLanguage"=>app()->getLocale(),
                "about"=>[
                    "@type"=>"Organization",
                    "@id"=> Request::url().'#organization',
                    "name"=>config('app.name'),
                    "sameAs"=> !empty( $settings_footer) ? [
                        $settings_footer['facebook_url'],
                        $settings_footer['instagram_url'],
                        $settings_footer['twitter_url'],
                        $settings_footer['snapchat_url'],
                        $settings_footer['linkedin_url'],
                        $settings_footer['youtube_url'],
                        $settings_footer['embeded_map_url'],
                    ] : null,
                    "logo"=>[
                        "@type"=>"ImageObject",
                        "@id"=>  Request::url().'#logo',
                        "url"=>$logo,
                        "contentUrl"=>$logo,
                        "caption"=>config('app.name'),
                        "inLanguage"=>app()->getLocale(),
                    ]
                ],
                "isPartOf"=>[
                    "@type"=>"WebPage",
                    "@id"=>  Request::url().'#webpage',
                    "url"=> Request::url(),
                    "inLanguage"=>app()->getLocale(),
                    "publisher"=>[
                        "@type"=>"Organization",
                        "@id"=> Request::url().'#organization',
                        "name"=>config('app.name'),
                        "sameAs"=> !empty( $settings_footer) ? [
                            $settings_footer['facebook_url'],
                            $settings_footer['instagram_url'],
                            $settings_footer['twitter_url'],
                            $settings_footer['snapchat_url'],
                            $settings_footer['linkedin_url'],
                            $settings_footer['youtube_url'],
                            $settings_footer['embeded_map_url'],
                        ] : null,
                        "logo"=>[
                            "@type"=>"ImageObject",
                            "@id"=> Request::url().'#logo',
                            "url"=>$logo,
                            "contentUrl"=>$logo,
                            "caption"=>config('app.name'),
                            "inLanguage"=>app()->getLocale(),
                        ],
                    ],
                    "potentialAction"=>[
                        "@type"=>"SearchAction",
                        "target"=>[
                            "@type"=>"EntryPoint",
                            "urlTemplate"=>Request::url().'?s={search_term_string}',
                        ],
                        "query-input"=>[
                            "@type"=>"PropertyValueSpecification",
                            "valueRequired"=>"http://schema.org/True",
                            "valueName"=>"search_term_string",
                        ],
                    ],
                ],
                "primaryImageOfPage"=>[
                    "@type"=>"ImageObject",
                    "@id"=>$blog_fea_image,
                    "url"=>$blog_fea_image,
                    "width"=> $width,
                    "height"=>$height,
                    "caption"=>"",
                    "inLanguage"=>app()->getLocale(),
                ],
            ],
            "publisher"=>[
                "@type"=>"Organization",
                "@id"=> Request::url().'#organization',
                "name"=>config('app.name'),
                "sameAs"=> !empty( $settings_footer) ? [
                    $settings_footer['facebook_url'],
                    $settings_footer['instagram_url'],
                    $settings_footer['twitter_url'],
                    $settings_footer['snapchat_url'],
                    $settings_footer['linkedin_url'],
                    $settings_footer['youtube_url'],
                    $settings_footer['embeded_map_url'],
                ] : null,
                "logo"=>[
                    "@type"=>"ImageObject",
                    "@id"=> Request::url().'#logo',
                    "url"=>$logo,
                    "contentUrl"=>$logo,
                    "caption"=>config('app.name'),
                ]
            ],
            "image"=>[
                "@type"=>"ImageObject",
                "@id"=>$blog_fea_image,
                "url"=>$blog_fea_image,
                "width"=> $width,
                "height"=>$height,
                "caption"=>"",
                "inLanguage"=>app()->getLocale(),
            ],
            "mainEntityOfPage"=>[
                "@type"=>"WebPage",
                "@id"=>  Request::url().'#webpage',
                "url"=> Request::url(),
                "name"=>$blog->meta_title,
                "datePublished"=>$blog->published_at,
                "dateModified"=>$blog->updated_at,
                "inLanguage"=>app()->getLocale(),
                "about"=>[
                    "@type"=>"Organization",
                    "@id"=> Request::url().'#organization',
                    "name"=>config('app.name'),
                    "sameAs"=> !empty( $settings_footer) ? [
                        $settings_footer['facebook_url'],
                        $settings_footer['instagram_url'],
                        $settings_footer['twitter_url'],
                        $settings_footer['snapchat_url'],
                        $settings_footer['linkedin_url'],
                        $settings_footer['youtube_url'],
                        $settings_footer['embeded_map_url'],
                    ] : null,
                    "logo"=>[
                        "@type"=>"ImageObject",
                        "@id"=>  Request::url().'#logo',
                        "url"=>$logo,
                        "contentUrl"=>$logo,
                        "caption"=>config('app.name'),
                        "inLanguage"=>app()->getLocale(),
                    ]
                ],
                "isPartOf"=>[
                    "@type"=>"WebSite",
                    "@id"=>  Request::url().'#website',
                    "url"=> Request::url(),
                    "name"=>config('app.name'),
                    "inLanguage"=>app()->getLocale(),
                    "publisher"=>[
                        "@type"=>"Organization",
                        "@id"=> Request::url().'#organization',
                        "name"=>config('app.name'),
                        "sameAs"=> !empty( $settings_footer) ? [
                            $settings_footer['facebook_url'],
                            $settings_footer['instagram_url'],
                            $settings_footer['twitter_url'],
                            $settings_footer['snapchat_url'],
                            $settings_footer['linkedin_url'],
                            $settings_footer['youtube_url'],
                            $settings_footer['embeded_map_url'],
                        ] : null,
                        "logo"=>[
                            "@type"=>"ImageObject",
                            "@id"=> Request::url().'#logo',
                            "url"=>$logo,
                            "contentUrl"=>$logo,
                            "caption"=>config('app.name'),
                            "inLanguage"=>app()->getLocale(),
                        ],
                    ],
                    "potentialAction"=>[
                        "@type"=>"SearchAction",
                        "target"=>[
                            "@type"=>"EntryPoint",
                            "urlTemplate"=>Request::url().'?s={search_term_string}',
                        ],
                        "query-input"=>[
                            "@type"=>"PropertyValueSpecification",
                            "valueRequired"=>"http://schema.org/True",
                            "valueName"=>"search_term_string",
                        ],
                    ],
                ],
                "primaryImageOfPage"=>[
                    "@type"=>"ImageObject",
                    "@id"=>$blog_fea_image,
                    "url"=>$blog_fea_image,
                    "width"=> $width,
                    "height"=>$height,
                    "caption"=>"",
                    "inLanguage"=>app()->getLocale(),
                ],
            ],
        ];

        $productencodedSchema=json_encode($productObject,   JSON_UNESCAPED_SLASHES);

        if($from){
            return $productencodedSchema;
        }else{
            echo $productencodedSchema;
        }
    }
}

if(!function_exists('blogdetails_article_schema')){
    function blogdetails_article_schema($blog,$from=null){

            $blog_details = Post::with(['post_translations'=>function($c){
                $c->where('locale','=',App::currentLocale());
            }])
            ->where('posts.status', 'active')
            ->where('posts.id', '=', $blog->id)
            ->groupBy('posts.id')
            ->first();

        $feature_image = !empty($blog_details)  ? $blog_details->featured_image : '';
        $fea_image = $width =  $height ='';
        $blog_fea_image = "";
        if(!empty($feature_image)) {
            if (file_exists(public_path() . '/frontend/posts/' . $feature_image)) {
                $fea_image=getimagesize(public_path('/frontend/posts/' . $feature_image));
                $width = $fea_image[0];
                $height = $fea_image[1];
                $blog_fea_image = asset('frontend/posts/' . $feature_image);
            }
        }
        $published_date = (!empty($blog->published_at) ? $blog->published_at->toDateTimeString() : '');
        $updated_date =$blog->updated_at->toDateTimeString();

        $productObject=[];
        $settings_footer=null;
        $all_settings = \App\Models\Setting::get(["id", "type", "section"]);
        $settings_footer = $all_settings->where('section', 'footer')->mapWithKeys(function($data){
            $data->translation = !$data->translation ? $data->translations[0] : $data->translation;
            if($data->type == 'address'){
                return [$data->translation->name => $data];
            }
            return [$data->translation->name => $data->translation->val ?? $data->val];
        });
        $settings_header = $all_settings->where('section', 'header')->mapWithKeys(function($data){
            $data->translation = !$data->translation ? $data->translations[0] : $data->translation;
            return [$data->translation->name => $data];
        });
        if(!empty($settings_header['logo'])){
            $logo =  asset("frontend/image/".$settings_header['logo']->val);
        }
        else{
            $logo = '';
        }
        $descriptionWithoutTags = strip_tags($blog->meta_description,);
        $descriptionFlattened = preg_replace('/\s+/', ' ', $descriptionWithoutTags);

        $productObject = [
            '@context' => 'http://schema.org',
            "@type"=> "Article",
            "@id"=>  Request::url().'#schema-7356',
            "headline"=>$blog_details->name,
            "keywords"=>$blog->meta_keywords,
            "datePublished"=>$published_date,
            "dateModified"=>$updated_date,
            "articleSection"=>"",
            "description"=> $descriptionFlattened,
            "name"=>$blog_details->meta_title,
            "inLanguage"=>app()->getLocale(),
            "author"=>[
                "@type" =>"Person",
                "@id"=>Request::url().'/author/'.$blog->created_by_alias,
                "name"=>$blog->created_by_alias,
                "url"=>Request::url().'/author/'.$blog->created_by_alias,
                "image"=>[
                    "@type"=>"ImageObject",
                    "@id"=>$blog_fea_image,
                    "url"=>$blog_fea_image,
                    "caption"=>$blog->intro,
                    "inLanguage"=>app()->getLocale(),
                ],
                "worksFor"=>[
                    "@type"=>"Organization",
                    "@id"=>  Request::url().'#organization',
                    "name"=>$blog->meta_title,
                    "sameAs"=> !empty( $settings_footer) ? [
                        $settings_footer['facebook_url'],
                        $settings_footer['instagram_url'],
                        $settings_footer['twitter_url'],
                        $settings_footer['snapchat_url'],
                        $settings_footer['linkedin_url'],
                        $settings_footer['youtube_url'],
                        $settings_footer['embeded_map_url'],
                    ] : null,
                    "logo"=>[
                        "@type"=>"ImageObject",
                        "@id"=>  Request::url().'#logo',
                        "url"=> $logo,
                        "contentUrl"=> $logo,
                        "caption"=>config('app.name'),
                        "inLanguage"=>app()->getLocale(),
                    ]
                ]
            ],
            "publisher"=>[
                "@type"=>"Organization",
                "@id"=> Request::url().'#organization',
                "name"=>config('app.name'),
                "sameAs"=> !empty( $settings_footer) ? [
                    $settings_footer['facebook_url'],
                    $settings_footer['instagram_url'],
                    $settings_footer['twitter_url'],
                    $settings_footer['snapchat_url'],
                    $settings_footer['linkedin_url'],
                    $settings_footer['youtube_url'],
                    $settings_footer['embeded_map_url'],
                ] : null,
                "logo"=>[
                    "@type"=>"ImageObject",
                    "@id"=> Request::url().'#logo',
                    "url"=> $logo,
                    "contentUrl"=> $logo,
                    "caption"=>config('app.name'),
                ]
            ],
            "isPartOf"=>[
                "@type"=>"WebPage",
                "@id"=>  Request::url().'#webpage',
                "url"=> Request::url(),
                "name"=>$blog->meta_title,
                "datePublished"=>$published_date,
                "dateModified"=>$updated_date,
                "inLanguage"=>app()->getLocale(),
                "isPartOf"=>[
                    "@type"=>"WebPage",
                    "@id"=>  Request::url().'#webpage',
                    "url"=> Request::url(),
                    "name"=>config('app.name'),
                    "inLanguage"=>app()->getLocale(),
                    "publisher"=>[
                        "@type"=>"Organization",
                        "@id"=> Request::url().'#organization',
                        "name"=>config('app.name'),
                        "sameAs"=> !empty( $settings_footer) ? [
                            $settings_footer['facebook_url'],
                            $settings_footer['instagram_url'],
                            $settings_footer['twitter_url'],
                            $settings_footer['snapchat_url'],
                            $settings_footer['linkedin_url'],
                            $settings_footer['youtube_url'],
                            $settings_footer['embeded_map_url'],
                        ] : null,
                        "logo"=>[
                            "@type"=>"ImageObject",
                            "@id"=> Request::url().'#logo',
                            "url"=> $logo,
                            "contentUrl"=> $logo,
                            "caption"=>config('app.name'),
                            "inLanguage"=>app()->getLocale(),
                        ],
                    ],
                ],
                "primaryImageOfPage"=>[
                    "@type"=>"ImageObject",
                    "@id"=>$blog_fea_image,
                    "url"=>$blog_fea_image,
                    "width"=> $width,
                    "height"=>$height,
                    "caption"=>"",
                    "inLanguage"=>app()->getLocale(),
                ],
                "breadcrumb" => [],
            ],
            "image"=>[
                "@type"=>"ImageObject",
                "@id"=>$blog_fea_image,
                "url"=>$blog_fea_image,
                "width"=> $width,
                "height"=>$height,
                "caption"=>"",
                "inLanguage"=>app()->getLocale(),
            ],
            "mainEntityOfPage"=>[
                "@type"=>"WebPage",
                "@id"=>  Request::url().'#webpage',
                "url"=> Request::url(),
                "name"=>$blog_details->meta_title,
                "datePublished"=>$published_date,
                "dateModified"=>$updated_date,
                "inLanguage"=>app()->getLocale(),
                "isPartOf"=>[
                    "@type"=>"WebSite",
                    "@id"=>  Request::url().'#website',
                    "url"=> Request::url(),
                    "name"=>config('app.name'),
                    "inLanguage"=>app()->getLocale(),
                    "publisher"=>[
                        "@type"=>"Organization",
                        "@id"=> Request::url().'#organization',
                        "name"=>config('app.name'),
                        "sameAs"=> !empty( $settings_footer) ? [
                            $settings_footer['facebook_url'],
                            $settings_footer['instagram_url'],
                            $settings_footer['twitter_url'],
                            $settings_footer['snapchat_url'],
                            $settings_footer['linkedin_url'],
                            $settings_footer['youtube_url'],
                            $settings_footer['embeded_map_url'],
                        ] : null,
                        "logo"=>[
                            "@type"=>"ImageObject",
                            "@id"=> Request::url().'#logo',
                            "url"=> $logo,
                            "contentUrl"=> $logo,
                            "caption"=>config('app.name'),
                            "inLanguage"=>app()->getLocale(),
                        ],
                    ],
                ],

                "primaryImageOfPage"=>[
                    "@type"=>"ImageObject",
                    "@id"=>$blog_fea_image,
                    "url"=>$blog_fea_image,
                    "width"=> $width,
                    "height"=>$height,
                    "caption"=>"",
                    "inLanguage"=>app()->getLocale(),
                ],
            ],
        ];
        $breadcrumbsObject=[];
        $breadcrumbs=Breadcrumbs::render('blog_details',array('title' => $blog_details->name, 'slug' => $blog_details->slug));

        foreach ($breadcrumbs->breadcrumbs as $key=>$bread) {
            $breadcrumbsObject[]=[
                "@type"=> "ListItem",
                "position"=> ++$key,
                "name"=>$bread->title,
                "item"=> [
                    "type"=>'Thing',
                    "@id"=> $bread->url,
                ]
            ];
        }
        $breadcrumbs_schema = [
            '@type' => 'BreadcrumbList',
            "itemListElement"=>[
                $breadcrumbsObject
            ],
        ];
        $productObject["breadcrumb"][] = $breadcrumbs_schema;

        $productencodedSchema=json_encode($productObject,   JSON_UNESCAPED_SLASHES);
        if($from){
            return $productencodedSchema;
        }else{
            echo $productencodedSchema;
        }
    }
}

function moveFeatureImage($path, $feature_image){
    if($feature_image && file_exists(public_path($path.'/' . $feature_image))){
        $featureImage = pathinfo($feature_image, PATHINFO_FILENAME);
        $ext = pathinfo($feature_image, PATHINFO_EXTENSION);

        $featureImage = str_replace('.','-',$featureImage); // this line for timestamp split to name in image
        $rand = rand(100, 999);
        // Generate a new image name
        $newImageName = str()->slug($featureImage).'-'.time(). $rand .'.'.$ext;

        // Update the new image name in the database

        // Rename the image file in the folder
        $oldImagePath = public_path($path.'/' . $feature_image);
        $newImagePath = public_path($path.'/' . $newImageName);
        File::move($oldImagePath, $newImagePath);

        return $newImageName;
    }
    return null;
}

function uploadImage($path, $image, $title = "", $unlinkImage=null, $isMakeWebp = false){


    $slug = "";
    if($title){
        $slug = str()->slug($title) .'-';
    }
    $rand = rand(100, 999);
    $imageName = $slug . time(). $rand. '.' . $image->getClientOriginalExtension();

    try{
        $image->move(public_path($path), $imageName);
        uploadThumbnail($imageName, $path, $path.'/compress');
        if($isMakeWebp){
            uploadWebp($path, $image,$imageName,$unlinkImage);
        }
        if($unlinkImage){
            $unlinkPath= public_path($path."/".$unlinkImage);
            if(File::exists($unlinkPath)){
                File::delete($unlinkPath);
            }
        }
        return $imageName;
    } catch(Exception $e){
        return null;
    }
}

function uploadWebp($path, $image,$imageName, $unlinkImage=null){
    $newPath = $path.'/webp';
    $imageNewName = explode('.',$imageName)[0].'.webp';
    try{
        File::copy(public_path($path.'/'.$imageName), public_path($newPath.'/'.$imageNewName));
        if($unlinkImage){
            $unlinkImage = explode('.',$unlinkImage)[0].'.webp';
            $unlinkPath = public_path($newPath."/".$unlinkImage);
            if(File::exists($unlinkPath)){
                File::delete($unlinkPath);
            }
        }
    } catch(Exception $e){
        return null;
    }
}

function uploadThumbnail($fileName, $existpath, $savePath,$width = 180,$height = 180, $realPath=null){
    if($fileName && file_exists(public_path($existpath.'/' . $fileName))){
        try{
            $imagepath = ($realPath) ? $realPath : asset($existpath.'/'.$fileName);
            $img = Image::make($imagepath);
            $width = getimagesize($imagepath)[0]; // getting the image width
            $height = getimagesize($imagepath)[1]; // getting the image height
            if(!File::isDirectory(public_path($savePath))){
                File::makeDirectory(public_path($savePath), $mode = 0777, true, true);
            }
            $imageNewName = explode('.',$fileName)[0].'.webp';
            $img->resize($width,$height, function ($constraint) {
                $constraint->aspectRatio();
            })->save($savePath.'/'.$imageNewName);
        }catch(Exception $e){
            return null;
        }
    }
}
