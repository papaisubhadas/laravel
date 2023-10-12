<?php

namespace Modules\Car\Models;

use Illuminate\Database\Eloquent\Model;

class CarAdditionalDetailTranslation extends Model
{
    //use HasFactory;

    protected $fillable = ['car_additional_detail_id', 'key', 'value'];
    public $timestamps = false;
}
