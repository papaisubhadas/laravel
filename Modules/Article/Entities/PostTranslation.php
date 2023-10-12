<?php

namespace Modules\Article\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model
{
    use HasFactory;

    protected $table = 'post_translations';

    protected $fillable = ['post_id','name', 'intro','content','meta_title', 'meta_description', 'meta_keywords','featured_image'];

    public $timestamps = false;
}
