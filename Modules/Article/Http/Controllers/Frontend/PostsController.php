<?php

namespace Modules\Article\Http\Controllers\Frontend;

use Illuminate\Support\Str;
use Modules\Car\Models\Car;
use Modules\Article\Entities\Post;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Article\Events\PostViewed;

class PostsController extends Controller
{
    public $module_title;

    public $module_name;

    public $module_path;

    public $module_icon;

    public $module_model;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Posts';

        // module name
        $this->module_name = 'posts';

        // directory path of the module
        $this->module_path = 'posts';

        // module icon
        $this->module_icon = 'fas fa-file-alt';

        // module model name, path
        $this->module_model = "Modules\Article\Entities\Post";
    }

    /**
     * Display a listing of the resource.
     * It will list the blogs
     * @return Response
     */
    public function blogs(Request $request)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';

        $$module_name = $module_model::latest()->where('posts.status', 'active')->with(['category'])->paginate(22);

        $most_rented_cars = getMostRentedCars(request(), 5);
        $get_locale_whatsapp_number = get_locale_whatsapp_number();
        $get_locale_contact_number = get_locale_contact_number();
        /*
        we are retrieving most rented cars from AppServiceProvider at root level so no need to fetch it again. it is common logic for entire site.
        */
        // SEO data
        $meta_title = !empty($$module_name_singular->meta_title)  ? $$module_name_singular->meta_title : '';
        $meta_description = !empty($$module_name_singular->meta_description)  ? $$module_name_singular->meta_description : '';
        $meta_keywords = !empty($$module_name_singular->meta_keyword)  ? $$module_name_singular->meta_keyword : '';
        $feature_image = !empty($$module_name_singular->feature_image)  ? $$module_name_singular->feature_image : '';
        return view(
            "article::frontend.$module_path.blogs",
            compact('module_title', 'module_name', 'module_icon', 'module_action', "$module_name",'module_name_singular','meta_title','meta_description','meta_keywords','feature_image','most_rented_cars','get_locale_whatsapp_number','get_locale_contact_number')
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function blog_details($slug)
    {
        // $id = decode_id($hashid);

        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Show';

        $meta_page_type = 'article';

        $$module_name_singular = $module_model::where('slug',$slug)->first();
        $most_rented_cars = getMostRentedCars(request(), 5);
        $get_locale_whatsapp_number = get_locale_whatsapp_number();
        $get_locale_contact_number = get_locale_contact_number();

        $meta_title = !empty($$module_name_singular->meta_title)  ? $$module_name_singular->meta_title : 'Friends Car Rental - ' . __('text.blog');
        $meta_description = !empty($$module_name_singular->meta_description)  ? $$module_name_singular->meta_description : '';
        $meta_keywords = !empty($$module_name_singular->meta_keyword)  ? $$module_name_singular->meta_keyword : '';
        $feature_image = !empty($$module_name_singular->feature_image)  ? $$module_name_singular->feature_image : '';

        if(empty($$module_name_singular))
        abort(404);

        event(new PostViewed($$module_name_singular));

        return view(
            "article::frontend.$module_name.blog_details",
            compact('module_title', 'module_name', 'module_icon', 'module_action', 'module_name_singular', "$module_name_singular", 'meta_page_type','meta_title','meta_description','meta_keywords','feature_image','most_rented_cars','get_locale_whatsapp_number','get_locale_contact_number')
        );
    }

}
