<?php

namespace Modules\Car\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarSpecificationTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['car_specification_id', 'specification_title'];
    public $timestamps = false;
}
