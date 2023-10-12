<?php

namespace Modules\CarType\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarTypeTranslation extends Model
{
    use HasFactory;

    protected $table = 'car_type_translations';

    protected $fillable = ['car_type_id', 'title','description', 'custom_title', 'meta_title', 'meta_description', 'meta_keyword'];
    public $timestamps = false;
}
