<?php

namespace Modules\Faq\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqQaDetail extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    // protected $with = ['translation'];
    public $translatedAttributes = ['question','answer'];

    protected $table = 'faq_qa_details';

    protected $fillable = [
        'faq_id',
    ];
    public function faq_qa_detail_translations()
    {
        return $this->hasOne('Modules\Faq\Models\FaqQaDetailTranslation', 'faq_qa_detail_id');
    }
}
