<?php

namespace Modules\Car\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarRentDetail extends Model
{
    use HasFactory;
    use Translatable;

    // protected $with = ['translation'];
    public $translatedAttributes = ['rent_detail_text'];

    protected $fillable = [
        'car_id',
    ];
}
