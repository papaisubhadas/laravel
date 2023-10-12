<?php

namespace Modules\Car\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarRentalRequirement extends Model implements TranslatableContract
{
    use HasFactory;

    use Translatable;
    public $translatedAttributes = ['key', 'value'];
    // protected $with = ['translation'];

    protected $fillable = [
        'car_id'
    ];
}
