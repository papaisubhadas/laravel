<?php

namespace Modules\Car\Models;

use Illuminate\Database\Eloquent\Model;

class CarFeatureTranslation extends Model
{
    //use HasFactory;

    protected $fillable = ['car_feature_id', 'feature_title'];
    public $timestamps = false;
}
