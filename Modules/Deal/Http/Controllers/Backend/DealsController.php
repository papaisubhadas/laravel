<?php

namespace Modules\Deal\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Modules\Car\Models\Car;
use Modules\Car\Models\CarTranslation;
use Modules\Deal\Models\Deal;
use Yajra\DataTables\DataTables;
use Modules\Faq\Models\Faq;
use Modules\Faq\Models\FaqQaDetail;
use Modules\Faq\Models\FaqQaDetailTranslation;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class DealsController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
       // module name
        $this->module_name = 'deals';

        // directory path of the module
        $this->module_path = 'deal::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-handshake';

        // module model name, path
        $this->module_model = "Modules\Deal\Models\Deal";
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
        $module_title = __('deal.deals_title');

        $$module_name = $module_model::paginate();

        logUserAccess($module_title.' '.$module_action);

        return view(
            "$module_path.$module_name.index_datatable",
            compact('module_title', 'module_name', "$module_name", 'module_icon', 'module_name_singular', 'module_action')
        );
    }

    /**
     * Select Options for Select 2 Request/ Response.
     *
     * @return Response
     */
    public function index_list(Request $request)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.list');
        $module_title = __('deal.deals_title');

        $term = trim($request->q);

        if (empty($term)) {
            return response()->json([]);
        }
        $query_data = $module_model::where('deal_type', 'LIKE', "%$term%")->orWhere('discount', 'LIKE', "%$term%")->limit(7)->get();
        $$module_name = [];

        foreach ($query_data as $row) {
            $$module_name[] = [
                'id' => $row->id,
                'text' => $row->deal_type.' (Discount: '.$row->discount.')',
            ];
        }

        return response()->json($$module_name);
    }

    public function index_data()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.list');
        $module_title = __('deal.deals_title');

        $page_heading = label_case($module_title);
        $title = $page_heading.' '.label_case($module_action);

        $$module_name = $module_model::select('*');
        $$module_name = $module_model::leftjoin('deal_translations', 'deals.id', '=', 'deal_translations.deal_id')
            ->select('deals.*' ,'deal_translations.deal_name AS deal_name','deal_translations.image AS image')
            ->where('deal_translations.locale','=',App::currentLocale())
            ->orderBy('deals.id','DESC');
        $data = $$module_name;

        return Datatables::of($$module_name)
            ->addColumn('action', function ($data) {
                $module_name = $this->module_name;

                return view('backend.includes.action_column', compact('module_name', 'data'));
            })
            ->editColumn('deal_name', function ($data) {

                if(App::currentLocale() == 'en'){
                    if($data->translate('en')) {
                        return '<strong>'.$data->translate('en')->deal_name.'</strong>';
                    }
                }
                if(App::currentLocale() == 'ar'){
                    if($data->translate('ar')) {
                        return '<strong>'.$data->translate('ar')->deal_name.'</strong>';
                    }
                }
                if(App::currentLocale() == 'fr'){
                    if($data->translate('fr')) {
                        return '<strong>'.$data->translate('fr')->deal_name.'</strong>';
                    }
                }
                if(App::currentLocale() == 'ru'){
                    if($data->translate('ru')) {
                        return '<strong>'.$data->translate('ru')->deal_name.'</strong>';
                    }
                }

                return '';
            })
            ->editColumn('image', function ($data) {

                if(App::currentLocale() == 'en'){
                    if($data->translate('en') && file_exists(public_path("/frontend/deals/{$data->translate('en')->image}"))) {
                        return '<img src='.url('frontend/deals/'.$data->translate('en')->image.'').' height="150" width="200" />';
                    }
                }
                if(App::currentLocale() == 'ar'){
                    if($data->translate('ar') && file_exists(public_path("/frontend/deals/{$data->translate('ar')->image}"))) {
                        return '<img src='.url('frontend/deals/'.$data->translate('ar')->image.'').' height="150" width="200" />';
                    }
                }
                if(App::currentLocale() == 'fr'){
                    if($data->translate('fr') && file_exists(public_path("/frontend/deals/{$data->translate('fr')->image}"))) {
                        return '<img src='.url('frontend/deals/'.$data->translate('fr')->image.'').' height="150" width="200" />';
                    }
                }
                if(App::currentLocale() == 'ru'){
                    if($data->translate('ru') && file_exists(public_path("/frontend/deals/{$data->translate('ru')->image}"))) {
                        return '<img src='.url('frontend/deals/'.$data->translate('ru')->image.'').' height="150" width="200" />';
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
                    return $data->updated_at->isoFormat('llll');
                }
            })
            ->filterColumn('deal_name', function($query, $keyword) {
                $sql = "deal_translations.deal_name  like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->filterColumn('image', function($query, $keyword) {
                $sql = "deal_translations.image  like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->rawColumns(['deal_name','image','status','action'])
            ->orderColumns(['deals.id'], '-:column $1')
            ->make(true);
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
        $module_title = __('deal.deals_title');
        $cars = Car::active()->get();

        logUserAccess($module_title.' '.$module_action);

        $faq = Faq::leftjoin('deals', 'faqs.reference_id','=','deals.id')
            ->leftjoin('faq_qa_details','faqs.id','=','faq_qa_details.faq_id')
            ->leftjoin('faq_qa_detail_translations','faq_qa_details.id','=','faq_qa_detail_translations.faq_qa_detail_id')
            ->select('faqs.*','faq_qa_detail_translations.*')->where('type','deal')
            ->get();

        $faq_en =$faq->where('locale','en');
        $faq_ar =$faq->where('locale','ar');
        $faq_fr =$faq->where('locale','fr');
        $faq_ru =$faq->where('locale','ru');

        return view(
            "$module_path.$module_name.create",
            compact('module_title', 'module_name', 'module_path', 'module_icon','cars','module_name_singular', 'module_action','faq_en','faq_ar','faq_fr','faq_ru')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
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
        $module_title = __('deal.deals_title');
        $data = $request->except('cars');

        $validator = Validator::make($request->all(),[

            'deal_name_en' => 'required|max:255',
            'image_en' => 'required|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'deal_name_ar' => 'required|max:255',
            'image_ar' => 'required|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'deal_name_fr' => 'required|max:255',
            'image_fr' => 'required|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'deal_name_ru' => 'required|max:255',
            'image_ru' => 'required|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'discount' => 'required|numeric|max:100.00',
            'deal_type' =>'required|in:daily,monthly',
            'status' =>'required|in:active,inactive',
            'cars.*' => 'required|numeric',
        ],
        [
            'deal_name_en.required' => 'Deal name in En is required',
            'deal_name_en.regex' => 'Deal Name in En does not allow special characters',
            'image_en.required' => 'Image in En is required',
            'deal_name_ar.required' => 'Deal name in Ar is required',
            'image_ar.required' => 'Image in Ar is required',
            'deal_name_fr.required' => 'Deal name in Fr is required',
            'image_fr.required' => 'Image in Fr is required',
            'deal_name_ru.required' => 'Deal name in Ru is required',
            'image_ru.required' => 'Image in Ru is required',
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'message' => '',
                'errors' => $validator->errors()
            ]);
        }

        if ($request->hasFile('image_en')) {
            $image_en = $request->file('image_en');
            // $image_name_en = 'en-'.time().'.'.$image_en->getClientOriginalExtension();
            // $destinationPath = base_path('public/frontend/deals');
            // $image_en->move($destinationPath, $image_name_en);
            $image_name_en = uploadImage("frontend/deals", $image_en, $request->input('deal_name_en'),null,true);
        }
        if ($request->hasFile('image_ar')) {
            $image_ar = $request->file('image_ar');
            // $image_name_ar = 'ar-'.time().'.'.$image_ar->getClientOriginalExtension();
            // $destinationPath = base_path('public/frontend/deals');
            // $image_ar->move($destinationPath, $image_name_ar);
            $image_name_ar = uploadImage("frontend/deals", $image_ar, $request->input('deal_name_en'),null,true);
        }
        if ($request->hasFile('image_fr')) {
            $image_fr = $request->file('image_fr');
            // $image_name_fr = 'fr-'.time().'.'.$image_fr->getClientOriginalExtension();
            // $destinationPath = base_path('public/frontend/deals');
            // $image_fr->move($destinationPath, $image_name_fr);
            $image_name_fr = uploadImage("frontend/deals", $image_fr, $request->input('deal_name_en'),null,true);
        }
        if ($request->hasFile('image_ru')) {
            $image_ru = $request->file('image_ru');
            // $image_name_ru = 'ru-'.time().'.'.$image_ru->getClientOriginalExtension();
            // $destinationPath = base_path('public/frontend/deals');
            // $image_ru->move($destinationPath, $image_name_ru);
            $image_name_ru = uploadImage("frontend/deals", $image_ru, $request->input('deal_name_en'),null,true);
        }

         //JM VPN Change
        //feature image code
        $imagename=feature_image('Deal',$request->deal_name_en);
        $$module_name_singular = $module_model::create([
            'en' => [
                'deal_name' => $request->deal_name_en,
                'image' => $image_name_en,
                'description' => $request->description_en,
            ],
            'ar' => [
                'deal_name' => $request->deal_name_ar,
                'image' => $image_name_ar,
                'description' => $request->description_ar,
            ],
            'fr' => [
                'deal_name' => $request->deal_name_fr,
                'image' => $image_name_fr,
                'description' => $request->description_fr,
            ],
            'ru' => [
                'deal_name' => $request->deal_name_ru,
                'image' => $image_name_ru,
                'description' => $request->description_ru,
            ],

            'discount' => $request->discount,
            'deal_type' => $request->deal_type,
            'status' => $request->status,
            'feature_image'=>  !empty($imagename['image_en'])  ?   $imagename['image_en']  : null, //JM VPN Change
        ]);

        //For Polymorphic with Addition New Value (Car Amount)
        $$module_name_singular->cars()->sync($this->mapIngredients($request->input('cars')));



        //For Simple Polymorphic
        //$$module_name_singular->cars()->attach($request->input('cars'));

        flash("<i class='fas fa-check'></i> New ".Str::singular($module_title).__('common.add_data'))->success()->important();

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

        return response()->json([
            'status' => 1,
            'message' => "<i class='fas fa-check'></i> New '" . Str::singular($module_title) . "' Added",
            'data' => [
                'redirect' => url("admin/$module_name")
            ]
        ]);
    }

    private function mapIngredients($values)
    {
        return collect($values)->map(function ($i) {
            return ['connectedcar_value' => $i];
        });
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
        $module_title = __('deal.deals_title');

        $$module_name_singular = $module_model::findOrFail($id);

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);


        return view(
            "$module_path.$module_name.show",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_name_singular', 'module_action', "$module_name_singular")
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
        $module_title = __('deal.deals_title');



        $deal = new Deal();
        $deal->load('cars');
        $deal = $module_model::findOrFail($id);
        $cars = Car::active()->get()->map(function($car) use ($deal) {
            $car->name = data_get($deal->cars->firstWhere('id', $car->id), 'pivot.connectedcar_value') ?? null;
            return $car;
        });

        $faq = Faq::leftjoin('deals', 'faqs.reference_id','=','deals.id')
        ->leftjoin('faq_qa_details','faqs.id','=','faq_qa_details.faq_id')
        ->leftjoin('faq_qa_detail_translations','faq_qa_details.id','=','faq_qa_detail_translations.faq_qa_detail_id')
        ->select('faqs.*','faq_qa_detail_translations.*')->where('deals.id',$id)->where('type','deal')
        ->get();


        $faq_en =$faq->where('locale','en');
        $faq_ar =$faq->where('locale','ar');
        $faq_fr =$faq->where('locale','fr');
        $faq_ru =$faq->where('locale','ru');

        logUserAccess($module_title.' '.$module_action.' | Id: '.$deal->id);

        return view(
            "$module_path.$module_name.edit",
            compact('module_title', 'module_name','cars', 'module_path', 'module_icon', 'module_action', 'module_name_singular','deal','faq_en','faq_ar','faq_fr','faq_ru')
        );
    }

    /**
     * Update the specified resource in storage.
     *
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
        $module_title = __('deal.deals_title');
        $validator = Validator::make($request->all(),[

            'deal_name_en' => 'required|max:255',
            'image_en' => 'mimes:jpeg,png,jpg,gif,svg,bmp,webp|max:2048',
            'deal_name_ar' => 'required|max:255',
            'image_ar' => 'mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'deal_name_fr' => 'required|max:255',
            'image_fr' => 'mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'deal_name_ru' => 'required|max:255',
            'image_ru' => 'mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'discount' => 'required|numeric|max:100.00',
            'deal_type' =>'required|in:daily,monthly',
            'status' =>'required|in:active,inactive',
            'cars.*' => 'required|numeric',

        ],
        [
            'deal_name_en.required' => 'Deal name in En is required',
            'deal_name_en.regex' => 'Deal Name in En does not allow special characters',
            'image_en.mimes' => 'Image in En is not valid type',
            'deal_name_ar.required' => 'Deal name in Ar is required',
            'image_ar.mimes' => 'Image in Ar is not valid type',
            'deal_name_fr.required' => 'Deal name in Fr is required',
            'image_fr.mimes' => 'Image in Fr is not valid type',
            'deal_name_ru.required' => 'Deal name in Ru is required',
            'image_ru.mimes' => 'Image in Ru is not valid type',
            'cars.*.numeric' => 'Car deal amount must be numeric',
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'message' => '',
                'errors' => $validator->errors()
            ]);
        }

        $$module_name_singular = $module_model::findOrFail($id);

        if ($request->hasFile('image_en')) {
            $image_en = $request->file('image_en');
            // $image_name_en = 'en-'.time().'.'.$image_en->getClientOriginalExtension();
            // $destinationPath = base_path('public/frontend/deals');
            // $image_en->move($destinationPath, $image_name_en);
            $image_name_en = uploadImage("frontend/deals", $image_en, $request->input('deal_name_en'), $$module_name_singular->translate('en')->image,true);
        }
        if ($request->hasFile('image_ar')) {
            $image_ar = $request->file('image_ar');
            // $image_name_ar = 'ar-'.time().'.'.$image_ar->getClientOriginalExtension();
            // $destinationPath = base_path('public/frontend/deals');
            // $image_ar->move($destinationPath, $image_name_ar);
            $image_name_ar = uploadImage("frontend/deals", $image_ar, $request->input('deal_name_en'), $$module_name_singular->translate('ar')->image,true);
        }
        if ($request->hasFile('image_fr')) {
            $image_fr = $request->file('image_fr');
            // $image_name_fr = 'fr-'.time().'.'.$image_fr->getClientOriginalExtension();
            // $destinationPath = base_path('public/frontend/deals');
            // $image_fr->move($destinationPath, $image_name_fr);
            $image_name_fr = uploadImage("frontend/deals", $image_fr, $request->input('deal_name_en'), $$module_name_singular->translate('fr')->image,true);
        }
        if ($request->hasFile('image_ru')) {
            $image_ru = $request->file('image_ru');
            // $image_name_ru = 'ru-'.time().'.'.$image_ru->getClientOriginalExtension();
            // $destinationPath = base_path('public/frontend/deals');
            // $image_ru->move($destinationPath, $image_name_ru);
            $image_name_ru = uploadImage("frontend/deals", $image_ru, $request->input('deal_name_en'), $$module_name_singular->translate('ru')->image,true);
        }
        //JM VPN Change
        //feature image code
        $imagename=feature_image('Deal',$request->deal_name_en, $$module_name_singular->feature_image);

       $$module_name_singular->update([
            'en' => [
                'deal_name' => $request->deal_name_en,
                'image' => isset($image_name_en) ? $image_name_en : $$module_name_singular->translate('en')->image,
                'description' => $request->description_en,
                //JM VPN changes
                'meta_title'=>$request->meta_title_en,
                'meta_keyword'=>$request->meta_keyword_en,
                'meta_description'=>$request->meta_description_en,
            ],
            'ar' => [
                'deal_name' => $request->deal_name_ar,
                'image' => isset($image_name_ar) ? $image_name_ar : $$module_name_singular->translate('ar')->image,
                'description' => $request->description_ar,
                //JM VPN changes
                'meta_title'=>$request->meta_title_ar,
                'meta_keyword'=>$request->meta_keyword_ar,
                'meta_description'=>$request->meta_description_ar,
            ],
            'fr' => [
                'deal_name' => $request->deal_name_fr,
                'image' => isset($image_name_fr) ? $image_name_fr : $$module_name_singular->translate('fr')->image,
                'description' => $request->description_fr,
                //JM VPN changes
                'meta_title'=>$request->meta_title_fr,
                'meta_keyword'=>$request->meta_keyword_fr,
                'meta_description'=>$request->meta_description_fr,
            ],
            'ru' => [
                'deal_name' => $request->deal_name_ru,
                'image' => isset($image_name_ru) ? $image_name_ru : $$module_name_singular->translate('ru')->image,
                'description' => $request->description_ru,
                //JM VPN changes
                'meta_title'=>$request->meta_title_ru,
                'meta_keyword'=>$request->meta_keyword_ru,
                'meta_description'=>$request->meta_description_ru,
            ],
            'discount' => $request->discount,
            'feature_image'=>  !empty($imagename['image_en'])  ?   $imagename['image_en']  : $$module_name_singular->feature_image, //JM VPN Change
            'deal_type' => $request->deal_type,
            'status' => $request->status,

        ]);


        $$module_name_singular->cars()->sync($this->mapIngredients($request->input('cars')));

        $deal_id =Faq::where('reference_id', $$module_name_singular->id)->where('type','deal')->first();
        if(!empty($deal_id)){

            $faq = [
                'name' => $request->deal_name_en,
                'slug' =>$request->slug,
                'status' => $request->status,
                'type'  => 'deal',
            ];
            $faq_add_id = Faq::where('reference_id',$deal_id->reference_id)->where('type','deal')->first();
            $faq_add_id->update($faq);
        }else{
            if($request->question_en[0]){
                $faq_add_id = Faq::create([
                    'reference_id'=>$$module_name_singular->id,
                    'name' => $request->deal_name_en,
                    'slug' =>$request->deal_type,
                    'status' => $request->status,
                    'type'  => 'deal',

                ]);
            }
        }


        //delete Faq Question Answer
        $delete_faq_qa_details_id  = $request->delete_faq_qa_details_id;
        $delete_faq_qa_details_arr = explode(',',$delete_faq_qa_details_id);
        if($request->delete_faq_qa_details_id != NULL) {
            foreach ($delete_faq_qa_details_arr as $delete_faq_qa_detail) {
                $faq_qa_detail = FaqQaDetail::find($delete_faq_qa_detail);
                $faq_qa_detail_trans = FaqQaDetailTranslation::where('faq_qa_detail_id', $delete_faq_qa_detail)->first();
                if(!empty($faq_qa_detail_trans)) {
                    $faq_qa_detail_trans->delete();
                }
                if($faq_qa_detail){
                    $faq_qa_detail->delete();
                }
            }
        }
        //updatye Faq qa detail in EN
        $question_ens = $request->question_en;
        $answer_ens = $request->answer_en;
        $faq_qa_details_id_en= $request->faq_qa_details_id_en;
        if(count($question_ens) > 0) {
            foreach ($question_ens as $index =>$question_en) {

                if(isset( $faq_qa_details_id_en[$index]) && $faq_qa_details_id_en[$index] != NULL) {
                    $faq_add_data = [
                        'en' => [
                            'question'       => $question_en,
                            'answer'         => $answer_ens[$index],
                        ],
                        'faq_id' => $faq_add_id->id,
                    ];
                    $faq_add = FaqQaDetail::find($faq_qa_details_id_en[$index]);
                    if($faq_add != NULL) {
                        $faq_add->update($faq_add_data);
                    }
                }
                else if(!empty($question_en) && !empty($answer_ens[$index])){
                    $faq_add_data = [
                        'en' => [
                            'question'       => $question_en,
                            'answer'      => $answer_ens[$index],
                        ],
                        'faq_id' => $faq_add_id->id,
                    ];
                    $faq_add = FaqQaDetail::create($faq_add_data);
                }
            }
        }
        //updatye Faq qa detail in AR
        $question_ars = $request->question_ar;
        $answer_ars = $request->answer_ar;
        $faq_qa_details_id_ar= $request->faq_qa_details_id_ar;
        if(count($question_ars) > 0) {
            foreach ($question_ars as $index =>$question_ar) {
                if(isset( $faq_qa_details_id_ar[$index]) && $faq_qa_details_id_ar[$index] != NULL) {
                    $faq_add_data = [
                        'ar' => [
                            'question'       => $question_ar,
                            'answer'         => $answer_ars[$index],
                        ],
                        'faq_id' => $faq_add_id->id,
                    ];
                    $faq_add = FaqQaDetail::find($faq_qa_details_id_ar[$index]);
                    if($faq_add != NULL) {
                        $faq_add->update($faq_add_data);
                    }
                }
                else if(!empty($question_ar) && !empty($answer_ars[$index])){
                    $faq_add_data = [
                        'ar' => [
                            'question'       => $question_ar,
                            'answer'      => $answer_ars[$index],
                        ],
                        'faq_id' => $faq_add_id->id,
                    ];
                    $faq_add = FaqQaDetail::create($faq_add_data);
                }
            }
        }
        //updatye Faq qa detail in FR
        $question_frs = $request->question_fr;
        $answer_frs = $request->answer_fr;
        $faq_qa_details_id_fr= $request->faq_qa_details_id_fr;
        if(count($question_frs) > 0) {
            foreach ($question_frs as $index =>$question_fr) {
                if(isset( $faq_qa_details_id_fr[$index]) && $faq_qa_details_id_fr[$index] != NULL) {
                    $faq_add_data = [
                        'fr' => [
                            'question'       => $question_fr,
                            'answer'         => $answer_frs[$index],
                        ],
                        'faq_id' => $faq_add_id->id,
                    ];
                    $faq_add = FaqQaDetail::find($faq_qa_details_id_fr[$index]);
                    if($faq_add != NULL) {
                        $faq_add->update($faq_add_data);
                    }
                }
                else if(!empty($question_fr) && !empty($answer_frs[$index])){
                    $faq_add_data = [
                        'fr' => [
                            'question'       => $question_fr,
                            'answer'      => $answer_frs[$index],
                        ],
                        'faq_id' => $faq_add_id->id,
                    ];
                    $faq_add = FaqQaDetail::create($faq_add_data);
                }
            }
        }

        //updatye Faq qa detail in RU
        $question_rus = $request->question_ru;
        $answer_rus = $request->answer_ru;
        $faq_qa_details_id_ru= $request->faq_qa_details_id_ru;
        if(count($question_rus) > 0) {
            foreach ($question_rus as $index =>$question_ru) {
                if(isset( $faq_qa_details_id_ru[$index]) && $faq_qa_details_id_ru[$index] != NULL) {
                    $faq_add_data = [
                        'ru' => [
                            'question'       => $question_ru,
                            'answer'         => $answer_rus[$index],
                        ],
                        'faq_id' => $faq_add_id->id,
                    ];

                    $faq_add = FaqQaDetail::find($faq_qa_details_id_ru[$index]);
                    if($faq_add != NULL) {
                        $faq_add->update($faq_add_data);
                    }
                }
                else if(!empty($question_ru) && !empty($answer_rus[$index])){
                    $faq_add_data = [
                        'ru' => [
                            'question'       => $question_ru ,
                            'answer'      => $answer_rus[$index],
                        ],
                        'faq_id' => $faq_add_id->id,
                    ];

                    $faq_add = FaqQaDetail::create($faq_add_data);
                }
            }
        }

        flash("<i class='fas fa-check'></i> ".Str::singular($module_title).__('common.updated_data'))->success()->important();

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

        return response()->json([
            'status' => 1,
            'message' => "<i class='fas fa-check'></i> New '" . Str::singular($module_title) . "' Added",
            'data' => [
                'redirect' => route("backend.$module_name.show", $$module_name_singular->id)
            ]
        ]);
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
        $module_title = __('deal.deals_title');

        $$module_name_singular = $module_model::findOrFail($id);

        $$module_name_singular->delete();

        flash("<i class='fas fa-check'></i> ".Str::singular($module_title).__('common.deleted_data'))->success()->important();

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

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
        $module_title = __('deal.deals_title');

        $$module_name = $module_model::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate();

        logUserAccess($module_title.' '.$module_action);

        return view(
            "$module_path.$module_name.trash",
            compact('module_title', 'module_name', 'module_path', "$module_name", 'module_icon', 'module_name_singular', 'module_action')
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
        $module_title = __('deal.deals_title');

        $$module_name_singular = $module_model::withTrashed()->find($id);
        $$module_name_singular->restore();

        flash("<i class='fas fa-check'></i> ".Str::singular($module_title).__('common.restored_data'))->success()->important();

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

        return redirect("admin/$module_name");
    }
    //JM vpn Changes
    public function delete($id){
        $module_name = $this->module_name;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);
        $$module_name_singular = $module_model::findOrFail($id);
        $data['feature_image'] =null;
        $filepath="frontend/Feature/Deal/".$$module_name_singular->feature_image;
         if(File::exists($filepath)){
            File::delete($filepath);
        }
        $$module_name_singular->update($data);
        return redirect("admin/$module_name");

    }
}
