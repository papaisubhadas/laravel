<?php

namespace Modules\Deal\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealTranslation extends Model
{
    use HasFactory;

    protected $table = 'deal_translations';

    protected $fillable = ['deal_id', 'deal_name','image','description','meta_title', 'meta_keyword','meta_description'];
    public $timestamps = false;

    protected $casts = [
        'faq' => 'array',
    ];
}
