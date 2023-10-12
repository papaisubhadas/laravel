<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'rating',
        'comment',
        'date',
        'status'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
