<?php

namespace Modules\Deal\Models;

use App\Models\BaseModel;
use App\Models\Traits\HasHashedMediaTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;

class Deal extends BaseModel implements HasMedia, TranslatableContract
{
    use HasFactory;
    use SoftDeletes;
    use HasHashedMediaTrait;
    use Translatable;

    protected $table = 'deals';
   // protected $with = ['translation'];

    public $translatedAttributes = ['deal_name', 'image','meta_title', 'meta_description', 'meta_keyword'];

    protected $fillable = [
        'deal_type',
        'discount',
        'feature_image',
        'status',
        'deal_car_ids'
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Deal\database\factories\DealFactory::new();
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function cars()
    {
        return $this->morphToMany('Modules\Car\Models\Car', 'connectedcar')->withPivot('connectedcar_value');
//        return $this->morphMany('Modules\Car\Model\Car', 'connectedcar');
    }
    public function deal_translations()
    {
        return $this->hasMany('Modules\Deal\Models\DealTranslation', 'deal_id');
    }

}
