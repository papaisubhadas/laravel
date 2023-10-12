<?php

namespace Modules\CarInquiry\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarInquiry extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'car_inquiries';

    public function car_type()
    {
        return $this->belongsTo('Modules\CarType\Models\CarType', 'car_type_id');
    }

    public function car()
    {
        return $this->belongsTo('Modules\Car\Models\Car', 'car_id');
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\CarInquiry\database\factories\CarInquiryFactory::new();
    }
}
