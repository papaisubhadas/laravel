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

Route::group(['namespace' => '\Modules\Car\Http\Controllers\Frontend', 'as' => 'frontend.', 'middleware' => 'web', 'prefix' => get_route_prefix()], function () {
    $module_name = 'cars';
    $controller_name = 'CarsController';
    Route::get("$module_name", ['as' => "$module_name.index", 'uses' => "$controller_name@index"]);
    Route::get("$module_name/{slug}", "$controller_name@car_details")->name('car_details');
    Route::get("$module_name/{id}/{slug?}", ['as' => "$module_name.show", 'uses' => "$controller_name@show"]);
    Route::post("$module_name", ['as' => "$module_name.store", 'uses' => "$controller_name@store"]);
    Route::get('car-detail/{id}', "$controller_name@car_detail")->name('car_detail');
     Route::get('get-latest-rental-offer-car', "$controller_name@get_latest_rental_offer_car")->name('get_latest_rental_offer_car');
    Route::put('car/book-now', "$controller_name@book_now")->name('car.book_now');

});


/*
*
* Backend Routes
*
* --------------------------------------------------------------------
*/
Route::group(['namespace' => '\Modules\Car\Http\Controllers\Backend', 'as' => 'backend.', 'middleware' => ['web', 'auth', 'can:view_backend'], 'prefix' => 'admin'], function () {
    /*
    * These routes need view-backend permission
    * (good if you want to allow more than one group in the backend,
    * then limit the backend features by different roles or permissions)
    *
    * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
    */

    /*
     *
     *  Backend Cars Routes
     *
     * ---------------------------------------------------------------------
     */
    $module_name = 'cars';
    $controller_name = 'CarsController';
    Route::get("$module_name/index_list", ['as' => "$module_name.index_list", 'uses' => "$controller_name@index_list"]);
    Route::get("$module_name/index_data", ['as' => "$module_name.index_data", 'uses' => "$controller_name@index_data"]);
    Route::get("$module_name/trashed", ['as' => "$module_name.trashed", 'uses' => "$controller_name@trashed"]);
    Route::patch("$module_name/trashed/{id}", ['as' => "$module_name.restore", 'uses' => "$controller_name@restore"]);
    Route::resource("$module_name", "$controller_name");
    Route::get("$module_name/delete_car/{id}", ['as' => "$module_name.delete", 'uses' => "$controller_name@delete"]);
    Route::get("$module_name/clone/{id}", ['as' => "$module_name.clone", 'uses' => "$controller_name@clone"]);
    Route::post("$module_name/delete_details/{id}", ['as' => "$module_name.delete_details", 'uses' => "$controller_name@delete_details"]);

});
Route::get('/404', function () {
    abort(404);
});
