<?php

namespace Modules\Car\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarHasCarType extends Model
{
    use HasFactory;

    protected $fillable = ['car_id', 'car_type_id'];

    public function car_type()
    {
        return $this->belongsTo('Modules\CarType\Models\CarType', 'car_type_id');
    }
}
