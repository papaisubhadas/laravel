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
Route::group(['namespace' => '\Modules\CarBrand\Http\Controllers\Frontend', 'as' => 'frontend.', 'middleware' => 'web', 'prefix' => get_route_prefix()], function () {

    /*
    *
    *  Frontend CarBrands Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'carbrands';
    $controller_name = 'CarBrandsController';
    //Route::get("$module_name", ['as' => "$module_name.index", 'uses' => "$controller_name@index"]);
    //Route::get("$module_name/{id}/{slug?}", ['as' => "$module_name.show", 'uses' => "$controller_name@show"]);
    Route::get('car-brands', "$controller_name@car_brands")->name("car_brands_list");
    Route::get('car-brands/{slug}', "$controller_name@car_brand_details")->name('car_brand_details');
});


/*
*
* Backend Routes
*
* --------------------------------------------------------------------
*/
Route::group(['namespace' => '\Modules\CarBrand\Http\Controllers\Backend', 'as' => 'backend.', 'middleware' => ['web', 'auth', 'can:view_backend'], 'prefix' => 'admin'], function () {
    /*
    * These routes need view-backend permission
    * (good if you want to allow more than one group in the backend,
    * then limit the backend features by different roles or permissions)
    *
    * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
    */

    /*
     *
     *  Backend CarBrands Routes
     *
     * ---------------------------------------------------------------------
     */
    $module_name = 'carbrands';
    $controller_name = 'CarBrandsController';
    Route::get("$module_name/index_list", ['as' => "$module_name.index_list", 'uses' => "$controller_name@index_list"]);
    Route::get("$module_name/index_data", ['as' => "$module_name.index_data", 'uses' => "$controller_name@index_data"]);
    Route::get("$module_name/trashed", ['as' => "$module_name.trashed", 'uses' => "$controller_name@trashed"]);
    Route::patch("$module_name/trashed/{id}", ['as' => "$module_name.restore", 'uses' => "$controller_name@restore"]);
    Route::resource("$module_name", "$controller_name");
    Route::get("$module_name/delete_car_brand/{id}", ['as' => "$module_name.delete", 'uses' => "$controller_name@delete"]);
    Route::post("$module_name/delete_details/{id}", ['as' => "$module_name.delete_details", 'uses' => "$controller_name@delete_details"]);
});
