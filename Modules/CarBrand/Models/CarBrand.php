<?php

namespace Modules\CarBrand\Models;

use App\Models\BaseModel;
use Modules\Car\Models\Car;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class CarBrand extends BaseModel implements TranslatableContract
{
    use HasFactory;
    use SoftDeletes;
    use Translatable;

    protected $table = 'car_brands';
  /*  protected $with = ['translation'];*/

    public $translatedAttributes = ['title', 'description', 'faq', 'custom_title', 'meta_title', 'meta_description', 'meta_keyword'];

    protected $fillable = [
        'slug',
        'image',
        'status',
        'feature_image'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
    public function cars()
    {
        return $this->hasMany(Car::class);
    }
    public function car_brand_translation()
    {
        return $this->hasMany('Modules\CarBrand\Models\CarBrandTranslation', 'car_brand_id');
    }
}
