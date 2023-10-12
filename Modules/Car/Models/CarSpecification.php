<?php

namespace Modules\Car\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarSpecification extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    // protected $with = ['translation'];
    public $translatedAttributes = ['specification_title'];

    protected $fillable = [
        'car_id',
        'icon_html'
    ];
}
