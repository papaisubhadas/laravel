<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CarInquiry extends Model
{
    use HasFactory,softDeletes;

    protected $fillable = [
        'car_type_id',
        'car_id',
        'customer_name',
        'customer_email',
        'customer_phone_no',
        'whatsapp_enable',
        'start_booking_date',
        'end_booking_date',
        'status'
    ];

    public function car_type()
    {
        return $this->belongsTo('App\Models\CarType', 'car_type_id');
    }

    public function car()
    {
        return $this->belongsTo('App\Models\Car', 'car_id');
    }
}
