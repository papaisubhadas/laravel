<?php

namespace Modules\Faq\Models;

use App\Models\BaseModel;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Faq extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'faqs';

    protected $fillable = [
        'reference_id',
        'name',
        'slug',
        'status',
        'type',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Faq\database\factories\FaqFactory::new();
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function faq_qa_details()
    {
        return $this->hasMany(FaqQaDetail::class, 'faq_id');
    }


}
