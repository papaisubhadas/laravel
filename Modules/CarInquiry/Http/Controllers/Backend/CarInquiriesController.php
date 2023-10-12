<?php

namespace Modules\CarInquiry\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;
use App\Mail\CarBookNow;
use App\Mail\InquiryUpdate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Modules\Car\Models\Car;
use Modules\Car\Models\CarTranslation;
use Modules\CarType\Models\CarType;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Artisan;

class CarInquiriesController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = __('carinquiry.carinquiries.title');

        // module name
        $this->module_name = 'carinquiries';

        // directory path of the module
        $this->module_path = 'carinquiry::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-file-lines';

        // module model name, path
        $this->module_model = "Modules\CarInquiry\Models\CarInquiry";
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

        $module_action =  __('common.list');
        $module_title = __('carinquiry.carinquiries.title');

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
        $module_title = __('carinquiry.carinquiries.title');

        $term = trim($request->q);

        if (empty($term)) {
            return response()->json([]);
        }

        $query_data = $module_model::where('customer_name', 'LIKE', "%$term%")->orWhere('customer_phone_no', 'LIKE', "%$term%")->limit(7)->get();

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
        $module_title = __('carinquiry.carinquiries.title');

        $page_heading = label_case($module_title);
        $title = $page_heading.' '.label_case($module_action);

        $$module_name = $module_model::leftjoin('car_translations', 'car_inquiries.car_id', '=', 'car_translations.car_id')
           // ->leftjoin('car_type_translations','car_inquiries.car_type_id','=','car_type_translations.car_type_id')
            ->select('car_inquiries.id' , 'car_inquiries.car_id', 'car_translations.name AS car_name','car_inquiries.customer_name', 'car_inquiries.customer_email','car_inquiries.customer_phone_no','car_inquiries.start_booking_date','car_inquiries.end_booking_date','car_inquiries.created_at','car_inquiries.status')
            ->where('car_translations.locale','=',App::currentLocale())
           // ->where('car_type_translations.locale','=',App::currentLocale())
            ->orderBy('car_inquiries.id','DESC');


        return Datatables::of($$module_name)
            ->addColumn('action', function ($data) {
                $module_name = $this->module_name;

                return view('backend.includes.action_column', compact('module_name', 'data'));
            })
            ->editColumn('car_name', '{{$car_name}}')
            ->editColumn('customer_name', '<strong>{{$customer_name}}</strong>')
            ->editColumn('car_type_id', function ($data) {
                if(!empty($data->car) && count($data->car->car_has_car_types) > 0) {
                    $car_type_str = '';
                    foreach($data->car->car_has_car_types as $index=>$car_has_car_type) {
                        if($index != 0) {
                            $car_type_str .= ', ';
                        }
                        if(!empty($car_has_car_type->car_type)  && $car_has_car_type->car_type!= NULL && $car_has_car_type->car_type->translate(App::currentLocale())) {
                            $car_type_str .= $car_has_car_type->car_type->translate(App::currentLocale())->title;
                        }
                    }
                    return $car_type_str;
                }

                return '';
            })
            ->editColumn('status', function ($data) {
                if($data->status == 'Pending')
                {
                    $is_featured = '<span class="badge bg-primary">Pending</span>';
                }elseif ($data->status == 'Under Review'){
                    $is_featured = '<span class="badge bg-warning">Under review</span>';
                }elseif ($data->status == 'Completed'){
                    $is_featured = '<span class="badge bg-success">Completed</span>';
                }elseif ($data->status == 'Cancelled'){
                    $is_featured = '<span class="badge bg-danger">Cancelled</span>';
                }

                return $is_featured;
            })
            ->editColumn('start_booking_date', function ($data) {

                $start_booking_date = Carbon::parse($data->start_booking_date)->format('d/M/Y h:i a');
                return $start_booking_date;

            })
            ->editColumn('end_booking_date', function ($data) {

                $end_booking_date = Carbon::parse($data->end_booking_date)->format('d/M/Y h:i a');
                return $end_booking_date;

            })
            ->editColumn('created_at', function ($data) {

                $diff = Carbon::parse($data->created_at)->format('d/M/Y h:i a');
                return $diff;

            })
            ->rawColumns(['id','car_id','car_type_id','customer_name','customer_email','customer_phone_no','start_booking_date','end_booking_date','created_at','status','action'])
            ->orderColumns(['car_inquiries.id'], '-:column $1')
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
        $module_title = __('carinquiry.carinquiries.title');
        $cars = CarTranslation::where('locale','=','en')->pluck('name', 'car_id');


        logUserAccess($module_title.' '.$module_action);

        return view(
            "$module_path.$module_name.create",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_name_singular', 'module_action','cars')
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
        $module_title = __('carinquiry.carinquiries.title');

        $validator = Validator::make($request->all(),[
            'car_name' => 'required',
            'customer_name' => 'required|max:255',
            'customer_email' => 'required||email:dns',
            'customer_phone_no' =>'required|regex:/^\\+?[1-9][0-9]{7,14}$/',
            'start_booking_date' =>'required|date',
            'end_booking_date' =>'required|date|after:start_booking_date',
            'status' =>'required|in:Pending,Under Review,Completed,Cancelled',
        ],
        [
            'car_name.required' => 'Car name is required',
            'customer_name.required' => 'Customer name is required',
            'customer_name.regex' => 'Customer name does not allow special character',
            'customer_email.required' => 'Customer email is required',
            'customer_phone_no.required' => 'Customer phone number is required',
            'start_booking_date.required' => 'Start booking date is required',
            'end_booking_date.required' => 'End booking date is required',
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'message' => '',
                'errors' => $validator->errors()
            ]);
        }

        $car_type_id = Car::where('id', $request->car_name)->first()->car_type_id;

        $$module_name_singular = $module_model::create([
            'car_id' => $request->car_name,
            'car_type_id' => $car_type_id,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone_no' => $request->customer_phone_no,
            'start_booking_date' => $request->start_booking_date,
            'end_booking_date' => $request->end_booking_date,
            'whatsapp_enable' => isset($request->whatsapp_enable)? $request->whatsapp_enable : 'no',
            'status' => $request->status,
        ]);

        flash("<i class='fas fa-check'></i> New ".Str::singular($module_title). __('common.add_data'))->success()->important();

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

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
        $module_title = __('carinquiry.carinquiries.title');

        $$module_name_singular = $module_model::findOrFail($id);

        $car_details = $module_model::leftjoin('car_translations', 'car_inquiries.car_id', '=', 'car_translations.car_id')
            //->leftjoin('car_type_translations','car_inquiries.car_type_id','=','car_type_translations.car_type_id')
            ->select('car_translations.name AS car_name', 'car_inquiries.*')
            ->where('car_translations.car_id','=',$$module_name_singular->car_id)
            ->where('car_translations.locale','=',App::currentLocale())
            //->where('car_type_translations.locale','=',App::currentLocale())
            ->get();

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

        return view(
            "$module_path.$module_name.show",
            compact('module_title', 'module_name', 'module_path', 'car_details','module_icon', 'module_name_singular', 'module_action', "$module_name_singular")
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
        $module_title = __('carinquiry.carinquiries.title');
        $cars = CarTranslation::where('locale','=','en')->pluck('name', 'car_id');

        $$module_name_singular = $module_model::findOrFail($id);

        if( $$module_name_singular){
            $$module_name_singular->customer_phone_no = str_replace("\u{A0}","", $$module_name_singular->customer_phone_no);
        }

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

        return view(
            "$module_path.$module_name.edit",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', "$module_name_singular",'cars')
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
            $module_title = __('carinquiry.carinquiries.title');

            $validator = Validator::make($request->all(),[
                'car_name' => 'required',
                'customer_name' => 'required|max:255',
                'customer_email' => 'required||email:dns',
                'customer_phone_no' =>'required|regex:/^\\+?[1-9][0-9]{7,14}$/',
                'start_booking_date' =>'required|date',
                'end_booking_date' =>'required|date|after:start_booking_date',
                'status' =>'required|in:Pending,Under Review,Completed,Cancelled',
            ],
            [
                'car_name.required' => 'Car name is required',
                'customer_name.required' => 'Customer name is required',
                'customer_name.regex' => 'Customer name does not allow special character',
                'customer_email.required' => 'Customer email is required',
                'customer_phone_no.required' => 'Customer phone number is required',
                'start_booking_date.required' => 'Start booking date is required',
                'end_booking_date.required' => 'End booking date is required',
            ]);

            if (!$validator->passes()) {
                return response()->json([
                    'status' => 0,
                    'message' => '',
                    'errors' => $validator->errors()
                ]);
            }


            $car_type_id = Car::where('id', $request->car_name)->first()->car_type_id;
            $$module_name_singular = $module_model::findOrFail($id);

            $$module_name_singular->update([
                'car_id' => $request->car_name,
                'car_type_id' => $car_type_id,
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_phone_no' => $request->customer_phone_no,
                'start_booking_date' => $request->start_booking_date,
                'end_booking_date' => $request->end_booking_date,
                'whatsapp_enable' => isset($request->whatsapp_enable)? $request->whatsapp_enable : 'no',
                'status' => $request->status,
            ]);
            if($request->status == 'Completed')
            {
                $customer_name = $request->customer_name;

                $car_name = Car::where('id', $request->car_name)->first()->custom_title;
                $subject = "Car Booking Confirmed!!!";
                $email = $request->customer_email;
                Mail::to($email)->send(new InquiryUpdate($customer_name,$car_name, $subject));
            }

            //$$module_name_singular->update($request->all());

            flash("<i class='fas fa-check'></i> ".Str::singular($module_title).__('common.updated_data'))->success()->important();

            logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

            return response()->json([
                'status' => 1,
                'message' => "<i class='fas fa-check'></i> New '" . Str::singular($module_title) . "' Added",
                'data' => [
                    'redirect' => route("backend.$module_name.show", $$module_name_singular->id)
                ]
            ]);

            //return redirect()->route("backend.$module_name.show", $$module_name_singular->id);
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
        $module_title = __('carinquiry.carinquiries.title');

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

        $module_action =  __('common.trashlist');
        $module_title = __('carinquiry.carinquiries.title');

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
        $module_title = __('carinquiry.carinquiries.title');

        $$module_name_singular = $module_model::withTrashed()->find($id);
        $$module_name_singular->restore();

        flash("<i class='fas fa-check'></i> ".Str::singular($module_title).__('common.restored_data'))->success()->important();

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

        return redirect("admin/$module_name");
    }

}
