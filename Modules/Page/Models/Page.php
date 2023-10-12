<?php

namespace Modules\Page\Models;

use App\Models\BaseModel;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class Page extends BaseModel implements TranslatableContract
{
    use HasFactory;
    use SoftDeletes;
    use Translatable;

    protected $table = 'pages';
    //protected $with = ['translation'];

    public $translatedAttributes = ['page_name', 'page_title','page_body'];

    protected $fillable = [
        'type',
        'slug',
        'status',
    ];
    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Page\database\factories\PageFactory::new();
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
