<?php

namespace Modules\Car\Models;

use Illuminate\Database\Eloquent\Model;

class CarRentalRequirementTranslation extends Model
{
   // use HasFactory;

    protected $fillable = ['car_rental_requirement_id', 'key', 'value'];
    public $timestamps = false;
}
