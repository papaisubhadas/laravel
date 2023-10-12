<?php

namespace Modules\Car\Models;

use Illuminate\Database\Eloquent\Model;

class CarDeliveryPickUpServiceTranslation extends Model
{
    //use HasFactory;

    protected $fillable = ['car_delivery_pick_up_service_id', 'service_title'];
    public $timestamps = false;
}
