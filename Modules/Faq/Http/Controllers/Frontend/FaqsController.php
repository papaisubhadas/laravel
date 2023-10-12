<?php

namespace Modules\Faq\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Modules\Faq\Models\Faq;
use Illuminate\Support\Facades\App;
use Modules\Article\Entities\Post;

class FaqsController extends Controller
{
    public function __construct()
    {
        // Page Title
        $this->module_title = 'Faqs';

        // module name
        $this->module_name = 'faqs';

        // directory path of the module
        $this->module_path = 'faq::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\Faq\Models\Faq";
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';

        $$module_name = $module_model::latest()->paginate();

        return view(
            "faq::frontend.$module_path.index",
            compact('module_title', 'module_name', "$module_name", 'module_icon', 'module_action', 'module_name_singular')
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $id = decode_id($id);

        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Show';

        $$module_name_singular = $module_model::findOrFail($id);

        return view(
            "faq::frontend.$module_name.show",
            compact('module_title', 'module_name', 'module_icon', 'module_action', 'module_name_singular', "$module_name_singular", 'posts')
        );
    }
    public function faqs(){
        $module_name = $this->module_name;
        $faq_details = Faq::leftjoin('faq_qa_details','faqs.id','=','faq_qa_details.faq_id')
            ->leftjoin('faq_qa_detail_translations','faq_qa_details.id','=','faq_qa_detail_translations.faq_qa_detail_id')
            ->select('faq_qa_detail_translations.*')
            ->where('faq_qa_detail_translations.locale','=',App::currentLocale())
            ->where('faqs.type','faq')
            ->get();
        $blogs = Post::active()->orderBy('id','desc')->get();
        return view(
            "faq::frontend.$module_name.faq",
            compact('faq_details', 'blogs')
        );
    }
}
