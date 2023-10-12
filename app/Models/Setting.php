<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Setting extends BaseModel implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    use SoftDeletes;

    protected $table = 'settings';
   // protected $with = ['translation','translations'];

    public $translatedAttributes = ['name', 'val'];

    protected $fillable = [
        'section',
        'type',
        //'deal_type',
        'is_only_english'
    ];
}
