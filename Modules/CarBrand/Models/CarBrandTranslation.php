<?php

namespace Modules\CarBrand\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarBrandTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['car_brand_id', 'title','description', 'faq', 'custom_title', 'meta_title', 'meta_description', 'meta_keyword'];
    public $timestamps = false;
    protected $casts = [
        'faq' => 'array',
    ];
}
