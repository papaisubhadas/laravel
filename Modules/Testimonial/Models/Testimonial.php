<?php

namespace Modules\Testimonial\Models;

use App\Models\BaseModel;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends BaseModel implements TranslatableContract
{
    use HasFactory;
    use SoftDeletes;
    use Translatable;

    protected $table = 'testimonials';
   // protected $with = ['translation'];

    public $translatedAttributes = ['name', 'comment'];

    protected $fillable = [
        'rating',
        'image',
        'status',
        'date'
    ];
    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Testimonial\database\factories\TestimonialFactory::new();
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
