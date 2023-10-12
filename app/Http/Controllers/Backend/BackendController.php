<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Modules\Car\Models\Car;
use Modules\CarType\Models\CarType;
use Modules\CarBrand\Models\CarBrand;
use Modules\CarInquiry\Models\CarInquiry;
use Illuminate\Support\Facades\App;

class BackendController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $car = Car::leftjoin('car_translations', 'cars.id', '=', 'car_translations.car_id')
            ->where('car_translations.locale','=',App::currentLocale())
            ->count();

        $car_type = CarType::leftjoin('car_type_translations', 'car_types.id', '=', 'car_type_translations.car_type_id')
           ->where('car_type_translations.locale','=',App::currentLocale())
            ->count();

        $car_brand = CarBrand::leftjoin('car_brand_translations', 'car_brands.id', '=', 'car_brand_translations.car_brand_id')
            ->where('car_brand_translations.locale','=',App::currentLocale())
            ->count(); 
        
        $inquiries = CarInquiry::leftjoin('car_translations', 'car_inquiries.car_id', '=', 'car_translations.car_id')
            ->where('car_translations.locale','=',App::currentLocale())
            ->where('car_inquiries.status','pending')
            ->count();

        return view('backend.index',compact('car','car_type','car_brand','inquiries'));
    }
}
