<?php

namespace Modules\Faq\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Modules\Car\Models\CarAdditionalDetail;
use Modules\Car\Models\CarAdditionalDetailTranslation;
use Modules\Faq\Models\Faq;
use Modules\Faq\Models\FaqQaDetailTranslation;
use Modules\Faq\Models\FaqQaDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;


use Yajra\DataTables\DataTables;

class FaqsController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // module name
        $this->module_name = 'faqs';

        // directory path of the module
        $this->module_path = 'faq::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-question';

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

        $module_action = __('common.list');
        $module_title = __('faq.faqs');

        $$module_name = $module_model::whereIn('type',['faq','contact-us'])->paginate();

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
        $module_title = __('faq.faqs');

        $term = trim($request->q);

        if (empty($term)) {
            return response()->json([]);
        }
        $query_data = $module_model::where('name', 'LIKE', "%$term%")->orWhere('slug', 'LIKE', "%$term%")->limit(7)->get();

        $$module_name = [];

        foreach ($query_data as $row) {
            $$module_name[] = [
                'id' => $row->id,
                'text' => $row->name.' (Slug: '.$row->slug.')',
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
        $module_title = __('faq.faqs');
        $page_heading = label_case($module_title);
        $title = $page_heading.' '.label_case($module_action);
        $$module_name = $module_model::select('*')->whereIn('type',['faq','contact-us']);

        return Datatables::of($$module_name)

            ->addColumn('action', function ($data) {
                $module_name = $this->module_name;

                return view('backend.includes.action_column', compact('module_name', 'data'));
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
           
            ->rawColumns(['name', 'action'])
            ->orderColumns(['id'], '-:column $1')
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
        $module_title = __('faq.faqs');

        logUserAccess($module_title.' '.$module_action);

        return view(
            "$module_path.$module_name.create",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_name_singular', 'module_action')
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
        $module_title = __('faq.faqs');

        $validator = Validator::make($request->all(),[
            'name'                   => 'required|max:255|regex:/^[a-zA-Z0-9\s]+$/',
            'question_en.*'          => 'required|max:255',
            'answer_en.*'            => 'required',
            'question_ar.*'          => 'required|max:255',
            'answer_ar.*'            => 'required',
            'question_fr.*'          => 'required|max:255',
            'answer_fr.*'            => 'required',
            'question_ru.*'          => 'required|max:255',
            'answer_ru.*'            => 'required',
            'status'                 => 'required|in:active,inactive',
            'slug'                   => 'max:255|regex:/^[a-z0-9-]+$/',
        ],
        [
            'name.required' => 'Deal name is required',
            'name.regex' => 'Name in En does not allow special characters',
            'question_en.*' => 'Question in En is required',
            'answer_en.*' => 'Answer in En is required',
            'question_ar.*' => 'Question in Ar is required',
            'answer_ar.*' => 'Answer in Ar is required',
            'question_fr.*' => 'Question in Fr is required',
            'answer_fr.*' => 'Answer in Fr is required',
            'question_ru.*' => 'Question in Ru is required',
            'answer_ru.*' => 'Answer in Ru is required',
            'slug.regex' => 'Slug should be in URL valid format.',
        
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'message' => '',
                'errors' => $validator->errors()
            ]);
        }
        $$module_name_singular = $module_model::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'status' => $request->status,
            'type'  => 'faq',

        ]);

        //store FAQ detail in EN
        $que_ens = $request->question_en;
        $ans_ens = $request->answer_en;

        if (count($que_ens) > 0) {
            foreach ($que_ens as $index => $que_ens) {
                $faq_add_data = [
                    'en' => [
                        'question' => $que_ens,
                        'answer' => $ans_ens[$index],
                    ],
                    'faq_id' => $$module_name_singular->id,
                ];
                $faq_add = FaqQaDetail::create($faq_add_data);
            }
        }

        //store FAQ detail in AR
        $que_ars = $request->question_ar;
        $ans_ars = $request->answer_ar;

        if (count($que_ars) > 0) {
            foreach ($que_ars as $index => $que_ars) {
                $faq_add_data = [
                    'ar' => [
                        'question' => $que_ars,
                        'answer' => $ans_ars[$index],
                    ],
                    'faq_id' => $$module_name_singular->id,
                ];
                $faq_add = FaqQaDetail::create($faq_add_data);
            }
        }

        //store FAQ detail in FR
        $que_frs = $request->question_fr;
        $ans_frs = $request->answer_fr;

        if (count($que_frs) > 0) {
            foreach ($que_frs as $index => $que_frs) {
                $faq_add_data = [
                    'fr' => [
                        'question' => $que_frs,
                        'answer' => $ans_frs[$index],
                    ],
                    'faq_id' => $$module_name_singular->id,
                ];
                $faq_add = FaqQaDetail::create($faq_add_data);
            }
        }

        //store FAQ detail in RU
        $que_rus = $request->question_ru;
        $ans_rus = $request->answer_ru;

        if (count($que_rus) > 0) {
            foreach ($que_rus as $index => $que_rus) {
                $faq_add_data = [
                    'ru' => [
                        'question' => $que_rus,
                        'answer' => $ans_rus[$index],
                    ],
                    'faq_id' => $$module_name_singular->id,
                ];
                $faq_add = FaqQaDetail::create($faq_add_data);
            }
        }
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
        $module_title = __('faq.faqs');

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
        $module_title = __('faq.faqs');

        $$module_name_singular = $module_model::findOrFail($id);
        $faq_data = $module_model::findOrFail($id);

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

        return view(
            "$module_path.$module_name.edit",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', "$module_name_singular",'faq_data')
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
        $module_title = __('faq.faqs');

        $validator = Validator::make($request->all(),[
            'name'                   => 'required|max:255|regex:/^[a-zA-Z0-9\s]+$/',
            'question_en.*'          => 'required|max:255',
            'answer_en.*'            => 'required',
            'question_ar.*'          => 'required|max:255',
            'answer_ar.*'            => 'required',
            'question_fr.*'          => 'required|max:255',
            'answer_fr.*'            => 'required',
            'question_ru.*'          => 'required|max:255',
            'answer_ru.*'            => 'required',
            'status'                 => 'required|in:active,inactive',
            'slug'                   => 'max:255|regex:/^[a-z0-9-]+$/',
        ],
        [
            'name.required' => 'Deal name is required',
            'name.regex' => 'Name in En does not allow special characters',
            'question_en.*' => 'Question in En is required',
            'answer_en.*' => 'Answer in En is required',
            'question_ar.*' => 'Question in Ar is required',
            'answer_ar.*' => 'Answer in Ar is required',
            'question_fr.*' => 'Question in Fr is required',
            'answer_fr.*' => 'Answer in Fr is required',
            'question_ru.*' => 'Question in Ru is required',
            'answer_ru.*' => 'Answer in Ru is required',
            'slug.regex' => 'Slug should be in URL valid format.',

        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'message' => '',
                'errors' => $validator->errors()
            ]);
        }
        $$module_name_singular = $module_model::findOrFail($id);
        $faq_data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'status' => $request->status,
            'type'  => 'faq',

        ];
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
                $faq_qa_detail->delete();
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
                        'faq_id' => $$module_name_singular->id,
                    ];
                    $faq_add = FaqQaDetail::find($faq_qa_details_id_en[$index]);
                    if($faq_add != NULL) {
                        $faq_add->update($faq_add_data);
                    }
                }
                else {
                    $faq_add_data = [
                        'en' => [
                            'question'       => $question_en,
                            'answer'      => $answer_ens[$index],
                        ],
                        'faq_id' => $$module_name_singular->id,
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
                        'faq_id' => $$module_name_singular->id,
                    ];
                    $faq_add = FaqQaDetail::find($faq_qa_details_id_ar[$index]);
                    $faq_add->update($faq_add_data);
                }
                else {
                    $faq_add_data = [
                        'ar' => [
                            'question'       => $question_ar,
                            'answer'      => $answer_ars[$index],
                        ],
                        'faq_id' => $$module_name_singular->id,
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
                        'faq_id' => $$module_name_singular->id,
                    ];
                    $faq_add = FaqQaDetail::find($faq_qa_details_id_fr[$index]);
                    $faq_add->update($faq_add_data);
                }
                else {
                    $faq_add_data = [
                        'fr' => [
                            'question'       => $question_fr,
                            'answer'      => $answer_frs[$index],
                        ],
                        'faq_id' => $$module_name_singular->id,
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
                        'faq_id' => $$module_name_singular->id,
                    ];
                    $faq_add = FaqQaDetail::find($faq_qa_details_id_ru[$index]);
                    $faq_add->update($faq_add_data);
                }
                else {
                    $faq_add_data = [
                        'ru' => [
                            'question'       => $question_ru,
                            'answer'      => $answer_rus[$index],
                        ],
                        'faq_id' => $$module_name_singular->id,
                    ];
                    $faq_add = FaqQaDetail::create($faq_add_data);
                }
            }
        }
        $$module_name_singular->update($faq_data);
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
        $module_title = __('faq.faqs');

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
        $module_title = __('faq.faqs');

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
        $module_title = __('faq.faqs');

        $$module_name_singular = $module_model::withTrashed()->find($id);
        $$module_name_singular->restore();

        flash("<i class='fas fa-check'></i> ".Str::singular($module_title).__('common.restoreded_data'))->success()->important();

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

        return redirect("admin/$module_name");
    }
}
