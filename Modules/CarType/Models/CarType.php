<?php

namespace Modules\CarType\Models;

use App\Models\Traits\HasHashedMediaTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Spatie\MediaLibrary\HasMedia;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Car\Models\Car;

class CarType extends BaseModel implements HasMedia, TranslatableContract
{
    use HasFactory;
    use SoftDeletes;
    use HasHashedMediaTrait;
    use Translatable;

    protected $table = 'car_types';
   /* protected $with = ['translation'];*/

    public $translatedAttributes = ['title', 'description', 'custom_title', 'meta_title', 'meta_description', 'meta_keyword'];

    protected $fillable = [
        'slug',
        'image',
        'status',
        'feature_image'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\CarType\database\factories\CarTypeFactory::new();
    }
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
