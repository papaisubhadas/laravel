<?php

namespace Modules\BannerSlideshow\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerSlideshowTranslation extends Model
{
    use HasFactory;

    protected $table = 'banner_slideshow_translations';

    protected $fillable = ['banner_slideshow_id', 'title','sub_title'];
    public $timestamps = false;
}
