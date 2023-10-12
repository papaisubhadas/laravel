<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Modules\Car\Models\Car;
use Modules\MostRentedCar\Models\MostRentedCar;
use App\Models\Country;
use Illuminate\Support\Facades\DB;
use Modules\Currency\Models\Currency;
use App\Models\Setting;
use Illuminate\Support\Facades\App;
use App\Models\SettingTranslation;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (!App::runningInConsole()) {
            Schema::defaultStringLength(191);
            /*
            ==========================================================================================
            Global logic for most rented cars for home page, 404 page, blog list and blog details page
            ==========================================================================================
             */
            $locale = array_key_exists(request()->segment(1), app()->config->get('app.available_locales'))?request()->segment(1):"en";
            app()->setLocale($locale);



            // $segment2 = \Request::segment(2);
            // switch ($segment2) {
            //     case "home":
            //         break;
            //     case "blogs": // for blogs and blog details page
            //         break;
            // }
            // $most_rented_cars = getMostRentedCars(request(), getMostRentedCarsLimit());
            /*
            ================================================================
            global logic for phone codes
            ================================================================
            */

            // $allCountryQuery = Country::query();
            // $dubai_phone_codes = $allCountryQuery->where('iso', 'AE')->first();
            // $phone_codes = $allCountryQuery->select(DB::raw('LOWER(iso) as iso_c,country.*'))->get();



            // if(!Cache::has('currencies-'.$locale)){
                Cache::remember('currencies-'.$locale,1200,function(){
                    return Currency::active()->get(["id","currency_code"]);
                });
            // }

            // if(!Cache::has('phoneNo')){
                // Cache::remember('phoneNo',1200,function(){
                //     return Setting::where('type', 'phone_no')->where('section', 'footer')->first();
                // });
            // }

            $currencies = Cache::get('currencies-'.$locale);
            // $phone_no = Cache::get('phoneNo');

            $en_whatsapp_no = $ar_whatsapp_no = $fr_whatsapp_no = $ru_whatsapp_no = '';

            // if(!Cache::has('settingData-'.$locale)){
                Cache::remember('settingData-'.$locale,1200,function(){
                    return SettingTranslation::leftJoin('settings', 'settings.id', 'setting_translations.setting_id')->get();
                });
            // }
            $settingData = collect(Cache::get('settingData-'.$locale));

            // if(!Cache::has('SettingTranslation-'.$locale)){
                Cache::remember('SettingTranslation-'.$locale,1200,function() use($settingData){
                    return $settingData->where('section', 'whatsapp_section');
                });
            // }

            $data = Cache::get('SettingTranslation-'.$locale);

            $en_whatsapp_no = $data->where('locale', 'en')->first();
            if (!empty($en_whatsapp_no)) {
                $en_whatsapp_no =  $en_whatsapp_no->val;
            }
            $ar_whatsapp_no = $data->where('locale', 'ar')->first();
            if (!empty($ar_whatsapp_no)) {
                $ar_whatsapp_no =  $ar_whatsapp_no->val;
            }
            $fr_whatsapp_no = $data->where('locale', 'fr')->first();
            if (!empty($fr_whatsapp_no)) {
                $fr_whatsapp_no =  $fr_whatsapp_no->val;
            }
            $ru_whatsapp_no =  $data->where('locale', 'ru')->first();
            if (!empty($ru_whatsapp_no)) {
                $ru_whatsapp_no =  $ru_whatsapp_no->val;
            }

            // if(!Cache::has('custom_css-'.$locale)){
                Cache::remember('custom_css-'.$locale,1200,function() use($settingData){
                    return $settingData->where('section', 'custom_code')
                    ->where('type', 'custom_css')
                    ->first();
                });
            // }

            $custom_css= Cache::has('custom_css-'.$locale);

            // if(!Cache::has('custom_js-'.$locale)){
                Cache::remember('custom_js-'.$locale,1200,function() use($settingData){
                    return $settingData->where('section', 'custom_code')
                        ->where('type', 'custom_js')
                        ->first();
                });
            // }

            $custom_js= Cache::has('custom_css-'.$locale);

            if(!Cache::has('google_analytics-'.$locale)){
                Cache::remember('google_analytics-'.$locale,1200,function() use($settingData){
                    return $settingData->where('section', 'google_analytics')
                        ->where('type', 'google_analytic')
                        ->first();
                });
            }

            $google_analytics = Cache::get('google_analytics-'.$locale);

            View::share([
                // 'most_rented_cars'=>$most_rented_cars,
                // 'phone_codes'=>$phone_codes,
                // 'dubai_phone_codes'=>$dubai_phone_codes,
                'currencies'=>$currencies,
                // 'phone_no'=>$phone_no,
                'en_whatsapp_no'=>$en_whatsapp_no,
                'ar_whatsapp_no'=>$ar_whatsapp_no,
                'fr_whatsapp_no'=>$fr_whatsapp_no,
                'ru_whatsapp_no'=>$ru_whatsapp_no,
                'custom_css'=>$custom_css,
                'custom_js'=>$custom_js,
                'google_analytics'=>$google_analytics,
            ]);
        }
    }
}
