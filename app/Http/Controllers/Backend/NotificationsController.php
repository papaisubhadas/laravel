<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laracasts\Flash\Flash;

class NotificationsController extends Controller
{
    public $module_title;

    public $module_name;

    public $module_path;

    public $module_icon;

    public $module_model;

    public function __construct()
    {
        // Page Title
        // $this->module_title = 'Notifications';

        // module name
        $this->module_name = 'notifications';

        // directory path of the module
        $this->module_path = 'notifications';

        // module icon
        $this->module_icon = 'c-icon fas fa-bell';

        // module model name, path
        $this->module_model = "App\Models\User";
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
        $module_title = __('notification.notification_title');

        $$module_name = auth()->user()->notifications()->paginate();
        $unread_notifications_count = auth()->user()->unreadNotifications()->count();

        Log::info(label_case($module_title.' '.$module_action).' | User:'.Auth::user()->name.'(ID:'.Auth::user()->id.')');

        return view(
            "backend.$module_path.index",
            compact('module_title', 'module_name', "$module_name", 'module_path', 'module_icon', 'module_action', 'module_name_singular', 'unread_notifications_count')
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
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.show');
        $module_title = __('notification.notification_title');

        $$module_name_singular = Notification::where('id', '=', $id)->where('notifiable_id', '=', auth()->user()->id)->first();

        if ($$module_name_singular) {
            if ($$module_name_singular->read_at == '') {
                $$module_name_singular->read_at = Carbon::now();
                $$module_name_singular->save();
            }
        } else {
            Log::info(label_case($module_title.' '.$module_action).' | User:'.Auth::user()->name.'(ID:'.Auth::user()->id.')');
            abort(404);
        }

        Log::info(label_case($module_title.' '.$module_action).' | User:'.Auth::user()->name.'(ID:'.Auth::user()->id.')');

        return view(
            "backend.$module_name.show",
            compact('module_title', 'module_name', 'module_icon', 'module_name_singular', 'module_action', "$module_name_singular")
        );
    }

    /**
     * Delete All the Notifications.
     *
     * @param  int  $id
     * @return Response
     */
    public function deleteAll()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.delete_all');
        $module_title = __('notification.notification_title');

        $user = auth()->user();

        $user->notifications()->delete();

        Flash::success("<i class='fas fa-check'></i> All Notifications Deleted")->important();

        Log::info(label_case($module_title.' '.$module_action).' | User:'.Auth::user()->name.'(ID:'.Auth::user()->id.')');

        return back();
    }

    /**
     * Mark All Notifications As Read.
     *
     * @return [type] [description]
     */
    public function markAllAsRead()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.all_read');
        $module_title = __('notification.notification_title');

        $user = auth()->user();

        $user->unreadNotifications()->update(['read_at' => now()]);

        Flash::success("<i class='fas fa-check'></i> __('common.updated_data')")->important();

        Log::info(label_case($module_title.' '.$module_action).' | User:'.Auth::user()->name.'(ID:'.Auth::user()->id.')');

        return back();
    }
}
