<?php

namespace Modules\CarInquiry\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class CarInquiriesController extends Controller
{
    public function __construct()
    {
        // Page Title
        $this->module_title = 'Car Inquiries';

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

        $module_action = 'List';

        $$module_name = $module_model::latest()->paginate();

        return view(
            "carinquiry::frontend.$module_name.index",
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
            "carinquiry::frontend.$module_name.show",
            compact('module_title', 'module_name', 'module_icon', 'module_action', 'module_name_singular', "$module_name_singular", 'posts')
        );
    }
}
