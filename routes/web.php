<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\Frontend\PagesController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Modules\Car\Models\Car;
use Modules\CarBrand\Models\CarBrand;
use Modules\CarType\Models\CarType;
use Modules\Deal\Models\Deal;

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
Route::get('/script/move-feature-image', function () {
    Artisan::call("optimize:clear");
    $cars = Car::whereNotNull('feature_image')->get();
    foreach ($cars as $car) {
        $path = 'frontend/Feature/Car';
        $newImageName = moveFeatureImage($path, $car->feature_image);
        if($newImageName){
            $car->update(['feature_image' => $newImageName]);
        }
    }

    $carBrands = CarBrand::whereNotNull('feature_image')->get();
    foreach ($carBrands as $brand) {
        $path = 'frontend/Feature/CarBrand';
        $newImageName = moveFeatureImage($path, $brand->feature_image);
        if($newImageName){
            $brand->update(['feature_image' => $newImageName]);
        }
    }

    $carTypes = CarType::whereNotNull('feature_image')->get();
    foreach ($carTypes as $type) {
        $path = 'frontend/Feature/CarType';
        $newImageName = moveFeatureImage($path, $type->feature_image);
        if($newImageName){
            $type->update(['feature_image' => $newImageName]);
        }
    }

    $deals = Deal::whereNotNull('feature_image')->get();
    foreach ($deals as $key => $deal) {
        $path = 'frontend/Feature/Deal';
        $newImageName = moveFeatureImage($path, $deal->feature_image);
        if($newImageName){
            $deal->update(['feature_image' => $newImageName]);
        }
    }
    return "Success";
});



Route::get('/script/compress-image', function () {
    Artisan::call("optimize:clear");
    $cars = Car::with('car_images_first')->whereNotNull('feature_image')->get();
    foreach ($cars as $car) {
        $path = 'frontend/image/';
        $newpath = 'frontend/image/compress';
        $fileName = $car->car_images_first->image;
        uploadThumbnail($fileName, $path, $newpath ,416,230);
    }

    $carBrands = CarBrand::whereNotNull('feature_image')->get();
    foreach ($carBrands as $brand) {
        $path = 'frontend/image/';
        $newpath = 'frontend/image/compress';
        uploadThumbnail($brand->image, $path, $newpath ,180,180);
    }

    $carTypes = CarType::whereNotNull('image')->get();
    foreach ($carTypes as $type) {
        $path = 'frontend/image/';
        $newpath = 'frontend/image/compress';
        uploadThumbnail($type->image, $path, $newpath ,180,180);
    }

    return "Success";
});



Route::get('/set-mobile-session', 'App\Http\Controllers\Frontend\FrontendController@setMobileSession');

// Auth Routes
require __DIR__.'/auth.php';
$prefixLocale = (array_key_exists(\Request::segment(1),app()->config->get('app.available_locales')) ? \Request::segment(1) : app()->config->get('app.fallback_locale'));

// Language Switch
Route::get(get_route_prefix().'/language/{language}', [LanguageController::class, 'switch'])->name('language.switch');

// Currency Switch
Route::get(get_route_prefix().'/currency/{currency}', [CurrencyController::class, 'switch'])->name('currency.switch');

Route::get(get_route_prefix().'/dashboard', 'App\Http\Controllers\Frontend\FrontendController@index')->name('dashboard');

/*
*
* Frontend Routes
*
* --------------------------------------------------------------------
*/
Route::group(['namespace' => 'App\Http\Controllers\Frontend', 'as' => 'frontend.','prefix' => get_route_prefix()], function () {
    ## These are pages controller routes
    Route::get('/', 'PagesController@index')->name('home');
    Route::get('contact-us', 'PagesController@contactus')->name('contact-us');
    Route::post('contact-now', 'PagesController@contact_now')->name('contact_now');
    Route::get('privacy', 'FrontendController@privacy')->name('privacy');
    Route::get('terms', 'FrontendController@terms')->name('terms');

    Route::group(['middleware' => ['auth']], function () {
        /*
        *
        *  Users Routes
        *
        * ---------------------------------------------------------------------
        */
        $module_name = 'users';
        $controller_name = 'UserController';
        Route::get('profile/{id}', ['as' => "$module_name.profile", 'uses' => "$controller_name@profile"]);
        Route::get('profile/{id}/edit', ['as' => "$module_name.profileEdit", 'uses' => "$controller_name@profileEdit"]);
        Route::patch('profile/{id}/edit', ['as' => "$module_name.profileUpdate", 'uses' => "$controller_name@profileUpdate"]);
        Route::get('profile/changePassword/{username}', ['as' => "$module_name.changePassword", 'uses' => "$controller_name@changePassword"]);
        Route::patch('profile/changePassword/{username}', ['as' => "$module_name.changePasswordUpdate", 'uses' => "$controller_name@changePasswordUpdate"]);
        Route::get("$module_name/emailConfirmationResend/{id}", ['as' => "$module_name.emailConfirmationResend", 'uses' => "$controller_name@emailConfirmationResend"]);
        Route::delete("$module_name/userProviderDestroy", ['as' => "$module_name.userProviderDestroy", 'uses' => "$controller_name@userProviderDestroy"]);
    });
});

/*
*
* Backend Routes
* These routes need view-backend permission
* --------------------------------------------------------------------
*/
Route::group(['namespace' => 'App\Http\Controllers\Backend', 'prefix' => 'admin', 'as' => 'backend.', 'middleware' => ['auth', 'can:view_backend']], function () {
    /**
     * Backend Dashboard
     * Namespaces indicate folder structure.
     */
    Route::get('/', 'BackendController@index')->name('home');
    Route::get('dashboard', 'BackendController@index')->name('dashboard');

    /*
     *
     *  Settings Routes
     *
     * ---------------------------------------------------------------------
     */
    Route::group(['middleware' => ['permission:edit_settings']], function () {
        $module_name = 'settings';
        $controller_name = 'SettingController';
        Route::get("$module_name", "$controller_name@index")->name("$module_name");
        Route::post("$module_name", "$controller_name@store")->name("$module_name.store");
    });

    /*
    *
    *  Notification Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'notifications';
    $controller_name = 'NotificationsController';
    Route::get("$module_name", ['as' => "$module_name.index", 'uses' => "$controller_name@index"]);
    Route::get("$module_name/markAllAsRead", ['as' => "$module_name.markAllAsRead", 'uses' => "$controller_name@markAllAsRead"]);
    Route::delete("$module_name/deleteAll", ['as' => "$module_name.deleteAll", 'uses' => "$controller_name@deleteAll"]);
    Route::get("$module_name/{id}", ['as' => "$module_name.show", 'uses' => "$controller_name@show"]);

    /*
    *
    *  Backup Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'backups';
    $controller_name = 'BackupController';
    Route::get("$module_name", ['as' => "$module_name.index", 'uses' => "$controller_name@index"]);
    Route::get("$module_name/create", ['as' => "$module_name.create", 'uses' => "$controller_name@create"]);
    Route::get("$module_name/download/{file_name}", ['as' => "$module_name.download", 'uses' => "$controller_name@download"]);
    Route::get("$module_name/delete/{file_name}", ['as' => "$module_name.delete", 'uses' => "$controller_name@delete"]);

    /*
    *
    *  Roles Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'roles';
    $controller_name = 'RolesController';
    Route::resource("$module_name", "$controller_name");

    /*
    *
    *  Users Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'users';
    $controller_name = 'UserController';
    Route::get("$module_name/profile/{id}", ['as' => "$module_name.profile", 'uses' => "$controller_name@profile"]);
    Route::get("$module_name/profile/{id}/edit", ['as' => "$module_name.profileEdit", 'uses' => "$controller_name@profileEdit"]);
    Route::patch("$module_name/profile/{id}/edit", ['as' => "$module_name.profileUpdate", 'uses' => "$controller_name@profileUpdate"]);
    Route::get("$module_name/emailConfirmationResend/{id}", ['as' => "$module_name.emailConfirmationResend", 'uses' => "$controller_name@emailConfirmationResend"]);
    Route::delete("$module_name/userProviderDestroy", ['as' => "$module_name.userProviderDestroy", 'uses' => "$controller_name@userProviderDestroy"]);
    Route::get("$module_name/profile/changeProfilePassword/{id}", ['as' => "$module_name.changeProfilePassword", 'uses' => "$controller_name@changeProfilePassword"]);
    Route::patch("$module_name/profile/changeProfilePassword/{id}", ['as' => "$module_name.changeProfilePasswordUpdate", 'uses' => "$controller_name@changeProfilePasswordUpdate"]);
    Route::get("$module_name/changePassword/{id}", ['as' => "$module_name.changePassword", 'uses' => "$controller_name@changePassword"]);
    Route::patch("$module_name/changePassword/{id}", ['as' => "$module_name.changePasswordUpdate", 'uses' => "$controller_name@changePasswordUpdate"]);
    Route::get("$module_name/trashed", ['as' => "$module_name.trashed", 'uses' => "$controller_name@trashed"]);
    Route::patch("$module_name/trashed/{id}", ['as' => "$module_name.restore", 'uses' => "$controller_name@restore"]);
    Route::get("$module_name/index_data", ['as' => "$module_name.index_data", 'uses' => "$controller_name@index_data"]);
    Route::get("$module_name/index_list", ['as' => "$module_name.index_list", 'uses' => "$controller_name@index_list"]);
    Route::resource("$module_name", "$controller_name");
    Route::patch("$module_name/{id}/block", ['as' => "$module_name.block", 'uses' => "$controller_name@block", 'middleware' => ['permission:block_users']]);
    Route::patch("$module_name/{id}/unblock", ['as' => "$module_name.unblock", 'uses' => "$controller_name@unblock", 'middleware' => ['permission:block_users']]);


});

Route::get('/404', function () {
    abort(404);
});


