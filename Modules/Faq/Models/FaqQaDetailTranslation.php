<?php

namespace Modules\Faq\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Faq\Models\FaqQaDetail;

class FaqQaDetailTranslation extends Model
{
    //use HasFactory;

    protected $table = 'faq_qa_detail_translations';

    protected $fillable = ['faq_qa_detail_id','question','answer'];
    public $timestamps = false;

}
