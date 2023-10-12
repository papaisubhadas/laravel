<?php

namespace Modules\Article\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Modules\Article\Entities\Category;
use Modules\Article\Events\PostCreated;
use Modules\Article\Events\PostUpdated;
use Modules\Article\Http\Requests\Backend\PostsRequest;
use Spatie\Activitylog\Models\Activity;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class PostsController extends Controller
{
    use Authorizable;

    public $module_title;

    public $module_name;

    public $module_path;

    public $module_icon;

    public $module_model;

    public function __construct()
    {
        // Page Title
        // $this->module_title = 'Posts';

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

        $module_action = __('common.list');
        $module_title = __('article-page.post_title');

        $$module_name = $module_model::latest()->paginate();

        Log::info(label_case($module_title.' '.$module_action).' | User:'.Auth::user()->name.'(ID:'.Auth::user()->id.')');

        return view(
            "article::backend.$module_path.index_datatable",
            compact('module_title', 'module_name', "$module_name", 'module_icon', 'module_name_singular', 'module_action')
        );
    }

    /**
     * Select Options for Select 2 Request/ Response.
     *
     * @return Response
     */
    public function index_data()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.list');
        $module_title = __('article-page.post_title');

        //$$module_name = $module_model::select('*');

        $$module_name = $module_model::leftjoin('post_translations', 'posts.id', '=', 'post_translations.post_id')
            ->select('posts.*' ,'post_translations.name AS name')
            ->where('post_translations.locale','=',App::currentLocale())
            ->orderBy('posts.id','DESC');

        $data = $$module_name;

        return Datatables::of($$module_name)
                        ->addColumn('action', function ($data) {
                            $module_name = $this->module_name;

                            return view('backend.includes.action_column', compact('module_name', 'data'));
                        })
                        ->editColumn('name', function ($data) {
                            if(App::currentLocale() == 'en'){
                                if($data->translate('en')) {
                                    return '<strong>'.$data->translate('en')->name.'</strong>';
                                }
                            }
                            if(App::currentLocale() == 'ar'){
                                if($data->translate('ar')) {
                                    return '<strong>'.$data->translate('ar')->name.'</strong>';
                                }
                            }
                            if(App::currentLocale() == 'fr'){
                                if($data->translate('fr')) {
                                    return '<strong>'.$data->translate('fr')->name.'</strong>';
                                }
                            }
                            if(App::currentLocale() == 'ru'){
                                if($data->translate('ru')) {
                                    return '<strong>'.$data->translate('ru')->name.'</strong>';
                                }
                            }
                            return '';
                        })
                        ->editColumn('featured_image', function ($data) {
                                if(App::currentLocale() == 'en'){
                                    if($data->translate('en') && file_exists(public_path("/frontend/posts/{$data->translate('en')->featured_image}"))) {
                                        return '<img src='.url('frontend/posts/'.$data->translate('en')->featured_image.'').' height="150" width="200" />';
                                    }
                                }
                                if(App::currentLocale() == 'ar'){
                                    if($data->translate('ar') && file_exists(public_path("/frontend/posts/{$data->translate('ar')->featured_image}"))) {
                                        return '<img src='.url('frontend/posts/'.$data->translate('ar')->featured_image.'').' height="150" width="200" />';
                                    }
                                }
                                if(App::currentLocale() == 'fr'){
                                    if($data->translate('fr')  && file_exists(public_path("/frontend/posts/{$data->translate('fr')->featured_image}"))) {
                                        return '<img src='.url('frontend/posts/'.$data->translate('fr')->featured_image.'').' height="150" width="200" />';
                                    }
                                }
                                if(App::currentLocale() == 'ru'){
                                    if($data->translate('ru')  && file_exists(public_path("/frontend/posts/{$data->translate('ru')->featured_image}"))) {
                                        return '<img src='.url('frontend/posts/'.$data->translate('ru')->featured_image.'').' height="150" width="200" />';
                                    }
                                }

                                return '';
                        })
                        ->editColumn('status', function ($data) {
                            if($data->status == 'active')
                                {
                                    $is_featured = '<span class="badge bg-success">Active</span>';
                                }else{
                                    $is_featured = '<span class="badge bg-danger">In Active</span>';
                                }

                                return $is_featured;
                            })
                        ->editColumn('updated_at', function ($data) {
                            $module_name = $this->module_name;

                            $diff = Carbon::now()->diffInHours($data->updated_at);

                            if ($diff < 25) {
                                return $data->updated_at->diffForHumans();
                            } else {
                                return $data->updated_at->isoFormat('LLLL');
                            }
                        })
                        ->filterColumn('name', function($query, $keyword) {
                            $sql = "post_translations.name  like ?";
                            $query->whereRaw($sql, ["%{$keyword}%"]);
                        })
                        ->filterColumn('featured_image', function($query, $keyword) {
                            $sql = "post_translations.featured_image  like ?";
                            $query->whereRaw($sql, ["%{$keyword}%"]);
                        })
                        ->rawColumns(['name', 'status','featured_image', 'action'])
                        ->orderColumns(['posts.id'], '-:column $1')
                        ->make(true);
    }

    public function index_list(Request $request)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.list');
        $module_title = __('article-page.post_title');

        $term = trim($request->q);

        if (empty($term)) {
            return response()->json([]);
        }

        $query_data = $module_model::where('name', 'LIKE', "%$term%")->published()->limit(10)->get();

        $$module_name = [];

        foreach ($query_data as $row) {
            $$module_name[] = [
                'id' => $row->id,
                'text' => $row->name,
            ];
        }

        return response()->json($$module_name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.create');
        $module_title = __('article-page.post_title');

        $categories = Category::pluck('name', 'id');

        Log::info(label_case($module_title.' '.$module_action).' | User:'.Auth::user()->name.'(ID:'.Auth::user()->id.')');

        return view(
            "article::backend.$module_name.create",
            compact('module_title', 'module_name', 'module_icon', 'module_action', 'module_name_singular', 'categories')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        Artisan::call("optimize:clear");
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.store');
        $module_title = __('article-page.post_title');

        $data = $request->except('tags_list');
        $data['created_by_name'] = auth()->user()->name;

        $validator = Validator::make($request->all(),[

            //'name_en' => 'required|max:191|regex:/^[a-zA-Z0-9\s]+$/',
            'name_en' => 'required|max:191',
            'name_ar' => 'required|max:191',
            'name_fr' => 'required|max:191',
            'name_ru' => 'required|max:191',

            // 'intro_en' => 'required|max:191',
            // 'intro_ar' => 'required|max:191',
            // 'intro_fr' => 'required|max:191',
            // 'intro_ru' => 'required|max:191',

            'content_en' => 'required',
            'content_ar' => 'required',
            'content_fr' => 'required',
            'content_ru' => 'required',

            'type' => 'required|max:191',
            'created_by_alias' => 'nullable|max:191',

            'featured_image_en' => 'required|mimes:jpeg,png,jpg,gif,webp|max:2048',

            'is_featured' => 'required',
            // 'order' => 'nullable|numeric',
            'status' => 'required|in:active,inactive',
            'slug' => 'nullable|max:255|regex:/^[a-z0-9-]+$/',

        ],
        [
            'name_en.required' => 'Name in En is required',
            // 'name_en.regex' => 'Name in En does not allow special characters',
            'name_ar.required' => 'Name in Ar is required',
            'name_fr.required' => 'Name in Fr is required',
            'name_ru.required' => 'Name in Ru is required',
            // 'intro_en.required' => 'Intro in En is required',
            // 'intro_ar.required' => 'Intro in Ar is required',
            // 'intro_fr.required' => 'Intro in Fr is required',
            // 'intro_ru.required' => 'Intro in Ru is required',
            'content_en.required' => 'Content in En is required',
            'content_ar.required' => 'Content in Ar is required',
            'content_fr.required' => 'Content in Fr is required',
            'content_ru.required' => 'Content in Ru is required',
            'featured_image_en.required' => 'Featured Image in En is required',
            'featured_image_ar.required' => 'Featured Image in Ar is required',
            'featured_image_fr.required' => 'Featured Image in Fr is required',
            'featured_image_ru.required' => 'Featured Image in Ru is required',
            'featured_image_en.mimes' => 'Featured Image in En is not valid type',
            'featured_image_ar.mimes' => 'Featured Image in Ar is not valid type',
            'featured_image_fr.mimes' => 'Featured Image in Fr is not valid type',
            'featured_image_ru.mimes' => 'Featured Image in Ru is not valid type',
            'slug.regex' => 'Slug should be in URL valid format.'

        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'message' => '',
                'errors' => $validator->errors()
            ]);
        }

        if ($request->hasFile('featured_image_en')) {
            $image = $request->file('featured_image_en');
            // $image_name = 'en-'.time().'.'.$image->getClientOriginalExtension();
            // $destinationPath = base_path('public/frontend/posts');
            // $image->move($destinationPath, $image_name);
            $data['featured_image_en'] = uploadImage("frontend/posts", $image, $request->input('name_en'),null,true);
        }
        // $imagename=feature_image('Article', $request->input('name_en'));
        $$module_name_singular = $module_model::create([
            'en' => [
                'name'              => $data['name_en'],
                // 'intro'             => $data['intro_en'],
                'content'           => $data['content_en'],
                'featured_image'    => $data['featured_image_en'] ?? "",
                //JM Vpn Changes
                'meta_title'    => $data['meta_title_en'],
                'meta_keywords'    => $data['meta_keywords_en'],
                'meta_description'    => $data['meta_description_en'],

            ],
            'ar' => [
                'name'              => $data['name_ar'],
                // 'intro'             => $data['intro_ar'],
                'content'           => $data['content_ar'],
                //JM Vpn Changes
                'meta_title'    => $data['meta_title_ar'],
                'meta_keywords'    => $data['meta_keywords_ar'],
                'meta_description'    => $data['meta_description_ar'],
            ],
            'fr' => [
                'name'              => $data['name_fr'],
                // 'intro'             => $data['intro_fr'],
                'content'           => $data['content_fr'],
                //JM Vpn Changes
                'meta_title'    => $data['meta_title_fr'],
                'meta_keywords'    => $data['meta_keywords_fr'],
                'meta_description'    => $data['meta_description_fr'],
            ],
            'ru' => [
                'name'              => $data['name_ru'],
                // 'intro'             => $data['intro_ru'],
                'content'           => $data['content_ru'],
                //JM Vpn Changes
                'meta_title'    => $data['meta_title_ru'],
                'meta_keywords'    => $data['meta_keywords_ru'],
                'meta_description'    => $data['meta_description_ru'],
            ],
            'slug' => $data['slug'],
            'type' => $data['type'],
            'is_featured' => $data['is_featured'],
            // 'meta_title' => $data['meta_title'],
            // 'meta_keywords' => $data['meta_keywords'],
            // 'meta_description' => $data['meta_description'],
            // 'meta_og_image' => $data['meta_og_image'],
            // 'order' => $data['order'],
            'status' => $data['status'],
            'published_at' => $data['published_at'],
            'created_by_alias' => $data['created_by_alias'],
            'created_by_name' => $data['created_by_name'],
            'feature_image'=> $data['featured_image_en'] ?? ""//JM VPN Change

        ]);
        // pr($$module_name_singular);
        //$$module_name_singular = $module_model::create($data);
        $$module_name_singular->tags()->attach($request->input('tags_list'));

        event(new PostCreated($$module_name_singular));

        flash("<i class='fas fa-check'></i> New ".Str::singular($module_title).__('common.add_data'))->success()->important();

        Log::info(label_case($module_title.' '.$module_action)." | '".$$module_name_singular->name.'(ID:'.$$module_name_singular->id.") ' by User:".Auth::user()->name.'(ID:'.Auth::user()->id.')');

        return response()->json([
            'status' => 1,
            'message' => "<i class='fas fa-check'></i> New '" . Str::singular($module_title) . "' Added",
            'data' => [
                'redirect' => url("admin/$module_name")
            ]
        ]);

        //return redirect("admin/$module_name");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.show');
        $module_title = __('article-page.post_title');

        $$module_name_singular = $module_model::findOrFail($id);

        $activities = Activity::where('subject_type', '=', $module_model)
                                ->where('log_name', '=', $module_name)
                                ->where('subject_id', '=', $id)
                                ->latest()
                                ->paginate();

        Log::info(label_case($module_title.' '.$module_action).' | User:'.Auth::user()->name.'(ID:'.Auth::user()->id.')');

        return view(
            "article::backend.$module_name.show",
            compact('module_title', 'module_name', 'module_icon', 'module_name_singular', 'module_action', "$module_name_singular", 'activities')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.edit');
        $module_title = __('article-page.post_title');

        $$module_name_singular = $module_model::findOrFail($id);

        // dd( $$module_name_singular);

        $categories = Category::pluck('name', 'id');

        Log::info(label_case($module_title.' '.$module_action)." | '".$$module_name_singular->name.'(ID:'.$$module_name_singular->id.") ' by User:".Auth::user()->name.'(ID:'.Auth::user()->id.')');

        return view(
            "article::backend.$module_name.edit",
            compact('categories', 'module_title', 'module_name', 'module_icon', 'module_name_singular', 'module_action', "$module_name_singular")
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
         Artisan::call("optimize:clear");
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);
        $module_action = __('common.update');
        $module_title = __('article-page.post_title');

        $data = $request->except('tags_list');
        $data['created_by_name'] = auth()->user()->name;

        $validator = Validator::make($request->all(),[

            // 'name_en' => 'required|max:191|regex:/^[a-zA-Z0-9\s]+$/',
            'name_en' => 'required|max:191',
            'name_ar' => 'required|max:191',
            'name_fr' => 'required|max:191',
            'name_ru' => 'required|max:191',

            // 'intro_en' => 'required|max:191',
            // 'intro_ar' => 'required|max:191',
            // 'intro_fr' => 'required|max:191',
            // 'intro_ru' => 'required|max:191',

            'content_en' => 'required',
            'content_ar' => 'required',
            'content_fr' => 'required',
            'content_ru' => 'required',

            'type' => 'required|max:191',
            //'category_id' => 'required|numeric',
            'created_by_alias' => 'nullable|max:191',

            'featured_image_en' => 'mimes:jpeg,png,jpg,gif,webp|max:2048',
            // 'featured_image_ar' => 'mimes:jpeg,png,jpg,gif|max:2048',
            // 'featured_image_fr' => 'mimes:jpeg,png,jpg,gif|max:2048',
            // 'featured_image_ru' => 'mimes:jpeg,png,jpg,gif|max:2048',

            'is_featured' => 'required',
            // 'order' => 'nullable|numeric',
            'status' => 'required|in:active,inactive',
            'slug' => 'nullable|max:255|regex:/^[a-z0-9-]+$/',

        ],
        [
            'name_en.required' => 'Name in En is required',
            // 'name_en.regex' => 'Name in En does not allow special characters',
            'name_ar.required' => 'Name in Ar is required',
            'name_fr.required' => 'Name in Fr is required',
            'name_ru.required' => 'Name in Ru is required',
            // 'intro_en.required' => 'Intro in En is required',
            // 'intro_ar.required' => 'Intro in Ar is required',
            // 'intro_fr.required' => 'Intro in Fr is required',
            // 'intro_ru.required' => 'Intro in Ru is required',
            'content_en.required' => 'Content in En is required',
            'content_ar.required' => 'Content in Ar is required',
            'content_fr.required' => 'Content in Fr is required',
            'content_ru.required' => 'Content in Ru is required',
            'featured_image_en.mimes' => 'Featured Image in En is not valid type',
            // 'featured_image_ar.mimes' => 'Featured Image in Ar is not valid type',
            // 'featured_image_fr.mimes' => 'Featured Image in Fr is not valid type',
            // 'featured_image_ru.mimes' => 'Featured Image in Ru is not valid type',
            'slug.regex' => 'Slug should be in URL valid format.'

        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'message' => '',
                'errors' => $validator->errors()
            ]);
        }
        $$module_name_singular = $module_model::findOrFail($id);

        // if ($request->hasFile('featured_image_ar')) {
        //     $image_ar = $request->file('featured_image_ar');
        //     $image_name_ar = 'ar-'.time().'.'.$image_ar->getClientOriginalExtension();
        //     $destinationPath = base_path('public/frontend/posts');
        //     $image_ar->move($destinationPath, $image_name_ar);
        // }
        // if ($request->hasFile('featured_image_fr')) {
        //     $image_fr = $request->file('featured_image_fr');
        //     $image_name_fr = 'fr-'.time().'.'.$image_fr->getClientOriginalExtension();
        //     $destinationPath = base_path('public/frontend/posts');
        //     $image_fr->move($destinationPath, $image_name_fr);
        // }
        // if ($request->hasFile('featured_image_ru')) {
        //     $image_ru = $request->file('featured_image_ru');
        //     $image_name_ru = 'ru-'.time().'.'.$image_ru->getClientOriginalExtension();
        //     $destinationPath = base_path('public/frontend/posts');
        //     $image_ru->move($destinationPath, $image_name_ru);

        // }


        $update_data = [
            'en' => [
                'name'              => $data['name_en'],
                // 'intro'             => $data['intro_en'],
                'content'           => $data['content_en'],
                // 'featured_image'    => isset($image_name_en) ? $image_name_en : $$module_name_singular->translate('en')->featured_image,
                //JM Vpn Changes
                'meta_title'    => $data['meta_title_en'],
                'meta_keywords'    => $data['meta_keywords_en'],
                'meta_description'    => $data['meta_description_en'],

            ],
            'ar' => [
                'name'              => $data['name_ar'],
                // 'intro'             => $data['intro_ar'],
                'content'           => $data['content_ar'],
                // 'featured_image'    => isset($image_name_ar) ? $image_name_ar : $$module_name_singular->translate('ar')->featured_image,
                //JM Vpn Changes
                'meta_title'    => $data['meta_title_ar'],
                'meta_keywords'    => $data['meta_keywords_ar'],
                'meta_description'    => $data['meta_description_ar'],
            ],
            'fr' => [
                'name'              => $data['name_fr'],
                // 'intro'             => $data['intro_fr'],
                'content'           => $data['content_fr'],
                // 'featured_image'    => isset($image_name_fr) ? $image_name_fr : $$module_name_singular->translate('fr')->featured_image,
                //JM Vpn Changes
                'meta_title'    => $data['meta_title_fr'],
                'meta_keywords'    => $data['meta_keywords_fr'],
                'meta_description'    => $data['meta_description_fr'],
            ],
            'ru' => [
                'name'              => $data['name_ru'],
                // 'intro'             => $data['intro_ru'],
                'content'           => $data['content_ru'],
                // 'featured_image'    => isset($image_name_ru) ? $image_name_ru : $$module_name_singular->translate('ru')->featured_image,
                //JM Vpn Changes
                'meta_title'    => $data['meta_title_ru'],
                'meta_keywords'    => $data['meta_keywords_ru'],
                'meta_description'    => $data['meta_description_ru'],
            ],
            'slug' => $data['slug'],
            'type' => $data['type'],
            'is_featured' => $data['is_featured'],
            // 'meta_title' => $data['meta_title'],
            // 'meta_keywords' => $data['meta_keywords'],
            // 'meta_description' => $data['meta_description'],
            // 'meta_og_image' => $data['meta_og_image'],
            // 'order' => $data['order'],
            'status' => $data['status'],
            'published_at' => $data['published_at'],
            'created_by_alias' => $data['created_by_alias'],
            'created_by_name' => $data['created_by_name']

        ];

        if ($request->hasFile('featured_image_en')) {

            $image_en = $request->file('featured_image_en');
            // $image_name_en = 'en-'.time().'.'.$image_en->getClientOriginalExtension();
            // $destinationPath = base_path('public/frontend/posts');
            // $image_en->move($destinationPath, $image_name_en);
            $feature_image = uploadImage("frontend/posts", $image_en, $request->input('name_en'),$$module_name_singular->feature_image,true);
            $update_data["feature_image"] = $feature_image ? $feature_image: $$module_name_singular->feature_image;
            $update_data["en"]["featured_image"] = $feature_image ? $feature_image: $$module_name_singular->feature_image;

        }


        $$module_name_singular->update($update_data);

        // pr($$module_name_singular->toArray());

        // $$module_name_singular->update($request->except('tags_list'));

        // if ($request->input('tags_list') == null) {
        //     $tags_list = [];
        // } else {
        //     $tags_list = $request->input('tags_list');
        // }
        // $$module_name_singular->tags()->sync($tags_list);

        event(new PostUpdated($$module_name_singular));

        flash("<i class='fas fa-check'></i> ".Str::singular($module_title).__('common.updated_data'))->success()->important();

        Log::info(label_case($module_title.' '.$module_action)." | '".$$module_name_singular->name.'(ID:'.$$module_name_singular->id.") ' by User:".Auth::user()->name.'(ID:'.Auth::user()->id.')');

        return response()->json([
            'status' => 1,
            'message' => "<i class='fas fa-check'></i> New '" . Str::singular($module_title) . "' Added",
            'data' => [
                // 'redirect' => route("backend.$module_name.show", $$module_name_singular->id)
                'redirect' => url("admin/$module_name")
            ]
        ]);
        //return redirect("admin/$module_name");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Artisan::call("optimize:clear");
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.destroy');
        $module_title = __('article-page.post_title');

        $$module_name_singular = $module_model::findOrFail($id);

        $$module_name_singular->delete();

        Flash::success('<i class="fas fa-check"></i> '.label_case($module_name_singular).' Has Been Deleted Successfully!')->important();

        Log::info(label_case($module_title.' '.$module_action)." | '".$$module_name_singular->name.', ID:'.$$module_name_singular->id." ' by User:".Auth::user()->name.'(ID:'.Auth::user()->id.')');

        return redirect("admin/$module_name");
    }

    /**
     * List of trashed ertries
     * works if the softdelete is enabled.
     *
     * @return Response
     */
    public function trashed()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.trashlist');
        $module_title = __('article-page.post_title');

        $$module_name = $module_model::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate();

        Log::info(label_case($module_title.' '.$module_action).' | User:'.Auth::user()->name);

        return view(
            "article::backend.$module_name.trash",
            compact('module_title', 'module_name', "$module_name", 'module_icon', 'module_name_singular', 'module_action')
        );
    }

    /**
     * Restore a soft deleted entry.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.restore');
        $module_title = __('article-page.post_title');

        $$module_name_singular = $module_model::withTrashed()->find($id);
        $$module_name_singular->restore();

        Flash::success('<i class="fas fa-check"></i> '.label_case($module_name_singular).' Has Been Restoreded Successfully!')->important();

        Log::info(label_case($module_action)." '$module_name': '".$$module_name_singular->name.', ID:'.$$module_name_singular->id." ' by User:".Auth::user()->name.'(ID:'.Auth::user()->id.')');

        return redirect("admin/$module_name");
    }
     //JM vpn Changes
     public function delete($id){
        $module_name = $this->module_name;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);
        $$module_name_singular = $module_model::findOrFail($id);
        $feature_image =null;
        $filepath="frontend/posts/".$$module_name_singular->translate("en")->featured_image;
        if(File::exists($filepath)){
            File::delete($filepath);
        }
        $$module_name_singular->update([
            'en' => [
                'featured_image'    => $feature_image
            ]
        ]);
        return redirect("admin/$module_name");

    }
    //Delete Details
    public function delete_details($id){
        $module_name = $this->module_name;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);
        $$module_name_singular = $module_model::findOrFail($id);
        $filepath = public_path('frontend/posts').'/'.$$module_name_singular->feature_image;
        if(File::exists($filepath)){
            File::delete($filepath);
        }
        $$module_name_singular->forceDelete();
        session()->flash('alert-delete', 'Posts has been Delete successfully');
        return response()->json(['redirect_url' => '/admin/posts/']);
    }

}
