<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
*
* Frontend Routes
*
* --------------------------------------------------------------------
*/
$prefixLocale = (array_key_exists(\Request::segment(1),app()->config->get('app.available_locales')) ? \Request::segment(1) : app()->config->get('app.fallback_locale'));

// Language Switch
Route::get(get_route_prefix().'/language/{language}', [LanguageController::class, 'switch'])->name('language.switch');

Route::group(['namespace' => '\Modules\CarType\Http\Controllers\Frontend', 'as' => 'frontend.', 'middleware' => 'web', 'prefix' => get_route_prefix()], function () {

    /*
     *
     *  Frontend CarTypes Routes
     *
     * ---------------------------------------------------------------------
     */
    $module_name = 'cartypes';
    $controller_name = 'CarTypesController';
    //Route::get("$module_name", ['as' => "$module_name.index", 'uses' => "$controller_name@index"]);
    //Route::get("$module_name/{id}/{slug?}", ['as' => "$module_name.show", 'uses' => "$controller_name@show"]);
    Route::get('car-types', "$controller_name@car_types")->name("car_types_list");
    Route::get('car-types/{slug}', "$controller_name@car_type_details")->name('car_type_details');
});


/*
*
* Backend Routes
*
* --------------------------------------------------------------------
*/
Route::group(['namespace' => '\Modules\CarType\Http\Controllers\Backend', 'as' => 'backend.', 'middleware' => ['web', 'auth', 'can:view_backend'], 'prefix' => 'admin'], function () {
    /*
    * These routes need view-backend permission
    * (good if you want to allow more than one group in the backend,
    * then limit the backend features by different roles or permissions)
    *
    * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
    */

    /*
     *
     *  Backend CarTypes Routes
     *
     * ---------------------------------------------------------------------
     */
    $module_name = 'cartypes';
    $controller_name = 'CarTypesController';
    Route::get("$module_name/index_list", ['as' => "$module_name.index_list", 'uses' => "$controller_name@index_list"]);
    Route::get("$module_name/index_data", ['as' => "$module_name.index_data", 'uses' => "$controller_name@index_data"]);
    Route::get("$module_name/trashed", ['as' => "$module_name.trashed", 'uses' => "$controller_name@trashed"]);
    Route::patch("$module_name/trashed/{id}", ['as' => "$module_name.restore", 'uses' => "$controller_name@restore"]);
    Route::delete("$module_name/{id}", ['as' => "$module_name.destroy", 'uses' => "$controller_name@destroy"]);

    Route::resource("$module_name", "$controller_name");
    Route::get("$module_name/delete_car_type/{id}", ['as' => "$module_name.delete", 'uses' => "$controller_name@delete"]);
    Route::post("$module_name/delete_details/{id}", ['as' => "$module_name.delete_details", 'uses' => "$controller_name@delete_details"]);
});
