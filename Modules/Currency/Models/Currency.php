<?php

namespace Modules\Currency\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currency extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'currencies';

    protected $fillable = [
        'name',
        'currency_code',
        'conversion_rate',
        'status'
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Currency\database\factories\CurrencyFactory::new();
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

}
