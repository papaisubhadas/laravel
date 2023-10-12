<?php

namespace Modules\MostRentedCar\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class MostRentedCar extends Model
{
    use HasFactory;
   // use SoftDeletes;

    protected $table = 'most_rented_cars';

    protected $fillable = [
       // 'car_id',
        'most_rent_car_display_order'
    ];

    /**
     *
     *
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\MostRentedCar\database\factories\MostRentedCarFactory::new();
    }

    public function mostrentablecar()
    {
        return $this->morphTo()->withTranslation();
    }

    public function car()
    {
        return $this->belongsTo('Modules\Car\Models\Car', 'mostrentablecar_id')->withTranslation();
    }
}
