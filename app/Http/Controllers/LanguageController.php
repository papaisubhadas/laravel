<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

class LanguageController extends Controller
{
    public function switch($language)
    {
        Artisan::call("optimize:clear");
        app()->setLocale($language);

        setlocale(LC_TIME, $language);

        Carbon::setLocale($language);
        //flash()->success(__('common.language_changed').' '.strtoupper($language))->important();

        $previousRoute = url()->previous();
        if(!get_headers($previousRoute) || (get_headers($previousRoute) && strpos(get_headers(url()->previous())[0], '404') == true)) {
            $previousRoute = $this->get_previous_locale_url($language,$previousRoute);
            return redirect($previousRoute);
        }

        $previousRouteName = \Route::getRoutes()->match(
            \Request::create($previousRoute)
        )->getName();
        $previousURLSegments = explode('.', $previousRouteName);

        // set locale to previous url only for frontend routes
        if ($previousURLSegments[0] == 'frontend') {
            $previousRoute = $this->get_previous_locale_url($language,$previousRoute);

            if($previousRouteName == NULL || !Route::has($previousRouteName)) {
                return redirect()->back();
            } else {
                return redirect($previousRoute);
            }
        } else { // route for backend side
            // set session value only for admin
            session()->put('locale', $language);
            if($previousRouteName == NULL || !Route::has($previousRouteName)) {
                return redirect()->back();
            } else {
                return redirect($previousRoute);
            }
        }

    }

    private function get_previous_locale_url($language,$previousRoute)
    {
        $previousSegments = explode('/', $previousRoute);

        if($language == 'en') {
            if (array_key_exists($previousSegments[3], app()->config->get('app.available_locales'))) {
                unset($previousSegments[3]);
                $previousRoute = implode('/', $previousSegments);
            }
        } else {
            if (array_key_exists($previousSegments[3], app()->config->get('app.available_locales'))) {
                $previousSegments[3] = $language;
                $previousRoute = implode('/', $previousSegments);
            } else {
                array_splice($previousSegments,3,0,array($language));
                $previousRoute = implode('/', $previousSegments);
            }
        }
        return $previousRoute;
    }
}
