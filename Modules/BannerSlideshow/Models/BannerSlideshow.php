<?php

namespace Modules\BannerSlideshow\Models;

use App\Models\BaseModel;
use App\Models\Traits\HasHashedMediaTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;

class BannerSlideshow extends BaseModel implements HasMedia, TranslatableContract
{
    use HasFactory;
    use SoftDeletes;
    use HasHashedMediaTrait;
    use Translatable;

    protected $table = 'banner_slideshows';

    public $translatedAttributes = ['title', 'sub_title'];

    protected $fillable = [
        'image',
        'status'
    ];
    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\BannerSlideshow\database\factories\BannerSlideshowFactory::new();
    }
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
