<?php

namespace Modules\Car\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarTranslation extends Model
{
    //use HasFactory;

    protected $fillable = ['car_id', 'name', 'custom_title', 'description', 'supplier_note', 'delivery', 'insurance', 'faq', 'meta_title', 'meta_description', 'meta_keyword'];
    public $timestamps = false;

    protected $casts = [
        'faq' => 'array',
    ];
}
