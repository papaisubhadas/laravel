<?php

namespace Modules\Car\Models;

use Illuminate\Database\Eloquent\Model;

class CarRentDetailTranslation extends Model
{
   // use HasFactory;

    protected $fillable = ['car_rent_detail_id', 'rent_detail_text'];
    public $timestamps = false;
}
