<?php

namespace Modules\Car\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarAdditionalDetail extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    public $translatedAttributes = ['key', 'value'];

    protected $fillable = [
        //'name', 'description', 'supplier_note', 'delivery', 'insurance',
        'car_id',
    ];
}
