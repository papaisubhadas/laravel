<?php

namespace Modules\Car\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use App;
use Modules\Faq\Models\Faq;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
class Car extends BaseModel implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    use SoftDeletes;

   // protected $with = ['translation'];

    public $translatedAttributes = ['name', 'custom_title', 'description', 'supplier_note', 'delivery', 'insurance', 'faq', 'meta_title', 'meta_description', 'meta_keyword'];

    protected $fillable = [
       // 'name', 'description', 'supplier_note', 'delivery', 'insurance',
        'car_brand_id',
        'car_type_id',
        //'deal_type',
        'delivery',
        'insurance',
        'slug',
        'custom_url_slug',
        'car_model_year',
        'deposit',
        'min_age',
        'daily_price',
        'weekly_price',
        'monthly_price',
        'daily_mileage_limit',
        'weekly_mileage_limit',
        'monthly_mileage_limit',
        'is_available',
        'feature_image',
        'status'
        ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $table = 'cars';
    protected $casts = [
        'faq' => 'array',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Car\database\factories\CarFactory::new();
    }

    /*--------Relations--------*/
    public function deals()
    {

        return $this->morphedByMany('Modules\Deal\Models\Deal', 'connectedcar')->withPivot('connectedcar_value');
//        return $this->morphTo();
    }

    // public function faqs()
    // {
    //     return $this->OneToOne('Modules\Faq\Models\Faq' ,'reference_id');
    // }

    public function car_images()
    {
        return $this->hasMany('Modules\Car\Models\CarImage', 'car_id')->orderBy('position');
    }

    public function car_images_first()
    {
        return $this->hasOne('Modules\Car\Models\CarImage', 'car_id')->where('position', '1');
    }

    public function car_offers()
    {
        return $this->hasMany('App\Models\CarOffer', 'car_id');
    }

    public function car_brand()
    {
        return $this->belongsTo('Modules\CarBrand\Models\CarBrand', 'car_brand_id');
    }
    public function car_translation()
    {
        return $this->hasMany('Modules\Car\Models\CarTranslation', 'car_id');
    }
    
    public function car_type()
    {
        return $this->belongsTo('Modules\CarType\Models\CarType', 'v');
    }

    public function car_rent_details()
    {
        return $this->hasMany('Modules\Car\Models\CarRentDetail', 'car_id');
    }

    public function car_specifications()
    {
        return $this->hasMany('Modules\Car\Models\CarSpecification', 'car_id');
    }

    public function car_features()
    {
        return $this->hasMany('Modules\Car\Models\CarFeature', 'car_id');
    }

    public function car_delivery_pick_up_services()
    {
        return $this->hasMany('Modules\Car\Models\CarDeliveryPickUpService', 'car_id');
    }

    public function car_additional_details()
    {
        return $this->hasMany('Modules\Car\Models\CarAdditionalDetail', 'car_id');
    }

    public function car_rental_includes()
    {
        return $this->hasMany('Modules\Car\Models\CarRentalInclude', 'car_id');
    }

    public function car_rental_requirements()
    {
        return $this->hasMany('Modules\Car\Models\CarRentalRequirement', 'car_id');
    }

    public function most_rented_cars()
    {
        return $this->morphOne('Modules\MostRentedCar\Models\MostRentedCar', 'mostrentablecar');
    }

    public function car_has_car_types()
    {
        return $this->hasMany('Modules\Car\Models\CarHasCarType', 'car_id');
    }
    /*--------Relations--------*/

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
//    public function scopeMostRentedCar($query)
//    {
//        return $query->where('is_most_rented', 'yes');
//    }
}
