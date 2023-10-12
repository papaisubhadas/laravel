<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'button_text',
        'call_to_action',
        'image',
        'mobile_view_image',
        'status'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
