<?php

namespace Modules\MostRentedCar\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Modules\Car\Models\Car;
use Modules\MostRentedCar\Models\MostRentedCar;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Artisan;

class MostRentedCarsController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        // $this->module_title = __('most_rented_car.most_rented_car');

        // module name
        $this->module_name = 'mostrentedcars';

        // directory path of the module
        $this->module_path = 'mostrentedcar::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\MostRentedCar\Models\MostRentedCar";
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
        $module_title = __('most_rented_car.most_rented_car');

        $$module_name = $module_model::latest()->paginate();

        Log::info(label_case($module_title.' '.$module_action).' | User:'.Auth::user()->name.'(ID:'.Auth::user()->id.')');

        return view(
            "mostrentedcar::backend.$module_name.index_datatable",
            compact('module_title', 'module_name', "$module_name", 'module_icon', 'module_name_singular', 'module_action')
        );
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
        $module_title = __('most_rented_car.most_rented_car');

        $$module_name = $module_model::select('*');


        $data = $$module_name;

        return Datatables::of($$module_name)
            ->addColumn('action', function ($data) {
                $module_name = $this->module_name;

                //view
                $action = '
                <div class="text-end"><a href="'.route("backend.$module_name.show", $data) .'" class="btn btn-success btn-sm " data-toggle="tooltip" title="Show Most Car Ranted">
    <i class="fas fa-desktop"></i>
</a>';

                //delete
                    $action .=  '<a  data-id="' .  $data->id . '" style="margin-left: 3px;" class="btn btn-danger btn-sm delete" data-toggle="tooltip" title="delete Most Car Ranted">
    <i class="fas fa-trash-alt"></i>
</a>';


                $action .= '</div>';

                return $action;

            })
            ->addColumn('car_id', function ($data) {
                $is_featured = ($data->is_featured) ? '<span class="badge bg-primary">Featured</span>' : '';

                if(!empty($data->car()->first()) && $data->car()->first()->translate(App::currentLocale())) {
                    return '<strong>'.$data->car()->first()->translate(App::currentLocale())->name.'</strong>';
                }

                return '';
            })
            ->editColumn('most_rent_car_display_order', function ($data) {
                return $data->most_rent_car_display_order;
            })
            ->rawColumns(['car_id','action'])
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
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_path = $this->module_path;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.create');
        $module_title = __('most_rented_car.most_rented_car');

        Log::info(label_case($module_title.' '.$module_action).' | User:'.Auth::user()->name.'(ID:'.Auth::user()->id.')');

        $most_rented_cars_id_arr = MostRentedCar::pluck('mostrentablecar_id', 'mostrentablecar_id')->toArray();
        $cars = Car::active()->get();

        return view(
            "mostrentedcar::backend.$module_name.create",
            compact('module_title', 'module_name', 'module_icon', 'module_path', 'module_name_singular', 'module_action', 'cars', 'most_rented_cars_id_arr')
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
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.store');
        $module_title = __('most_rented_car.most_rented_car');

        $validator = Validator::make($request->all(), [
            'car_id'                        => 'required|unique:most_rented_cars,mostrentablecar_id',
            'most_rent_car_display_order'   => 'required|numeric|unique:most_rented_cars,most_rent_car_display_order',
        ], [
            'car_id.required'                       => __('most_rented_car.car_id_required'),
            'car_id.unique'                         => __('most_rented_car.car_id_unique'),
            'most_rent_car_display_order.required'  => __('most_rented_car.most_rent_car_display_order_required'),
            'most_rent_car_display_order.numeric'   => __('most_rented_car.most_rent_car_display_order_numeric'),
            'most_rent_car_display_order.unique'    => __('most_rented_car.most_rent_car_display_order_unique'),
        ]);

        //error come
        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'message' => '',
                'errors' => $validator->errors()
            ]);
        }//success
        else {

           /* $most_rented_car_data = [
                'car_id'                        => $request->input('car_id'),
                'most_rent_car_display_order'   => $request->input('most_rent_car_display_order'),
            ];

            $$module_name_singular = $module_model::create($most_rented_car_data);*/

            $car = Car::find($request->input('car_id'));

            $most_rent_car = new MostRentedCar;
            //$most_rent_car->car_id = $request->input('car_id');
            $most_rent_car->most_rent_car_display_order = $request->input('most_rent_car_display_order');

            $car->most_rented_cars()->save($most_rent_car);

            //auth()->user()->notify(new NewCommentAdded($$module_name_singular));

            flash("<i class='fas fa-check'></i> New '" . Str::singular($module_title) . __('common.add_data'))->success()->important();

            Log::info(label_case($module_title . ' ' . $module_action) . " | '" . $car->name . '(ID:' . $car->id . ") ' by User:" . Auth::user()->name . '(ID:' . Auth::user()->id . ')');

            return response()->json([
                'status' => 1,
                'message' => "<i class='fas fa-check'></i> " . Str::singular($module_title) . __('common.add_data'),
                'data' => [
                    'redirect' => url("admin/$module_name")
                ]
            ]);
        }
    }

    //most rented data dalete
    public function delete_data(Request $request){
        $module_title = $this->module_title;

        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $id = $request->id;
        $most_rented_car = MostRentedCar::find($id);

        if (empty($most_rented_car)) {
            return response()->json([
                'status' => 0,
                'message' => __('most_rented_car.delete_most_rent_rec_fail'),
                'errors' => ''
            ]);
        }

        $most_rented_car->delete();

        flash("<i class='fas fa-check'></i> ".Str::singular($module_title).__('common.deleted_data'))->success()->important();

        return response()->json([
            'status' => 1,
            'message' => __('most_rented_car.delete_most_rent_rec_suc'),
            'data' => []
        ]);
    }
}
