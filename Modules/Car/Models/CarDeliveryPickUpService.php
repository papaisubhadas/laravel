<?php

namespace Modules\Car\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarDeliveryPickUpService extends Model implements TranslatableContract
{
    use HasFactory;
    use \Astrotomic\Translatable\Translatable;
    public $translatedAttributes = ['service_title'];

    protected $fillable = [
        'car_id'
    ];

    protected $table = 'car_delivery_pick_up_services';
}
