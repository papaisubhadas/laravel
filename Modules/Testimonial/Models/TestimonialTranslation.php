<?php

namespace Modules\Testimonial\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimonialTranslation extends Model
{
    use HasFactory;

    protected $table = 'testimonial_translations';

    protected $fillable = ['testimonial_id', 'name','comment'];
    public $timestamps = false;

}
