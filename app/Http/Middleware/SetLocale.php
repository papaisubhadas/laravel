<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // check for parameter is exist in current route
        $routeParam = $request->route()->parameterNames();
        if(!empty($routeParam) && isset($routeParam[0])) {
            if(Route::current()->hasParameter($routeParam[0]) == false) {
                abort(404);
            }
        }
        
        $language = (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) : app()->config->get('app.fallback_locale'));
        $urlLocale = $request->segment(1);
        $routeNameArray = explode('.', Route::currentRouteName());

        // frontend side URL
        if ($routeNameArray[0] == 'frontend') {
            // if language is set in URL
            if (array_key_exists($urlLocale, app()->config->get('app.available_locales'))) {
                $language = $urlLocale;
            }
        } else { //backend side URL
            if (session()->has('locale')) {
                $language = session()->get('locale');
            }
            session()->put('locale', $language);
        }
        app()->setLocale($language);
        setlocale(LC_TIME, $language);
        return $next($request);
    }
}
