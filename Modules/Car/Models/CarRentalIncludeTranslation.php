<?php

namespace Modules\Car\Models;

use Illuminate\Database\Eloquent\Model;

class CarRentalIncludeTranslation extends Model
{
    //use HasFactory;

    protected $fillable = ['car_rental_include_id', 'key', 'value'];
    public $timestamps = false;
}
