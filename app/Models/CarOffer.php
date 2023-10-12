<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarOffer extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'deal_type',
        'title',
        'sub_title',
        'call_to_action',
        'offer_type',
        'offer_value',
        'status',
        'offer_start_date',
        'offer_end_date'
    ];

    public function car()
    {
        return $this->belongsTo('App\Models\Car',"car_id");
    }
}
