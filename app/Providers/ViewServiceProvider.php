<?php

namespace App\Providers;

use Modules\CarBrand\Models\CarBrand;
use Modules\CarType\Models\CarType;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Modules\Page\Models\Page;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if (! App::runningInConsole()) {
            $locale = array_key_exists(request()->segment(1), app()->config->get('app.available_locales'))?request()->segment(1):"en";
            app()->setLocale($locale);

            // if(!Cache::has('car_brands-'.$locale)){
                Cache::remember('car_brands-'.$locale,1200,function(){
                    return CarBrand::with(['translation'])->active()->orderBy('id', 'desc')->get();
                });
            // }

            // if(!Cache::has('car_types-'.$locale)){
                Cache::remember('car_types-'.$locale,1200,function(){
                    return CarType::with(['translation'])->active()->orderBy('id', 'desc')->get();
                });
            // }

            // if(!Cache::has('pages-'.$locale)){
                Cache::remember('pages-'.$locale,1200,function(){
                    return Page::with(['translation'])->where('type','page')->active()->orderBy('id','desc')->get(["id","slug"]);
                });
            // }

            View::share([
                'car_brands'=> Cache::get('car_brands-'.$locale),
                'car_types'=> Cache::get('car_types-'.$locale),
                'pages'=> Cache::get('pages-'.$locale)
            ]);
        }
    }
}
