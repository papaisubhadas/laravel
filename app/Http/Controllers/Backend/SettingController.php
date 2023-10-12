<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\SettingTranslation;
use File;
use Illuminate\Support\Facades\Artisan;

class SettingController extends Controller
{
    public $module_title;

    public $module_name;

    public $module_path;

    public $module_icon;

    public $module_model;

    public function __construct()
    {
        // Page Title
        // $this->module_title = __('settings.settings');

        // module name
        $this->module_name = 'settings';

        // directory path of the module
        $this->module_path = 'settings';

        // module icon
        $this->module_icon = 'fas fa-cogs';

        // module model name, path
        $this->module_model = "App\Models\Setting";
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
        $module_title = __('settings.settings');

        $$module_name = $module_model::paginate();
        $$module_model = $module_model;

        Log::info(label_case($module_title.' '.$module_action).' | User:'.Auth::user()->name.'(ID:'.Auth::user()->id.')');

        return view(
            "backend.$module_path.index",
            compact('module_title', 'module_name', "$module_name", 'module_path', 'module_icon', 'module_action', 'module_name_singular', "$module_model")
        );
    }

    public function store(Request $request)
    {
        Artisan::call("optimize:clear");
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('common.Store');
        $module_title = __('settings.settings');

        $validator = Validator::make($request->all(), [
            //'logo_en'               => 'required|mimes:jpeg,jpg,png|max:2048',
            'email_en'              => 'required|email:dns',
            'facebook_url_en'       => 'required|url',
            'instagram_url_en'      => 'required|url',
            'snapchat_url_en'       => 'required|url',
            'youtube_url_en'        => 'required|url',
            'linkedin_url_en'       => 'required|url',
            'twitter_url_en'        => 'required|url',
            'apple_link_en'         => 'required',
            'apple_image_en'        => 'mimes:jpeg,jpg,png,webp|max:2048',
            'google_play_link_en'   => 'required',
            'google_play_image_en'  => 'mimes:jpeg,jpg,png,webp|max:2048',

            //'logo_footer_en'                => 'required|mimes:jpeg,jpg,png|max:2048',
            'address_footer_en'             => 'required',
            'email_footer_en'               => 'required|email:dns',
            'phone_no_footer_en'            => 'required|numeric',
            'embeded_map_url_footer_en'            => 'required|url',
            'facebook_url_footer_en'        => 'required|url',
            'instagram_url_footer_en'       => 'required|url',
            'snapchat_url_footer_en'        => 'required|url',
            'youtube_url_footer_en'         => 'required|url',
            'linkedin_url_footer_en'        => 'required|url',
            'twitter_url_footer_en'         => 'required|url',
            'apple_link_footer_en'          => 'required',
            'apple_image_footer_en'         => 'mimes:jpeg,jpg,png,webp|max:2048',
            'google_play_link_footer_en'    => 'required',
            'google_play_image_footer_en'   => 'mimes:jpeg,jpg,png,webp|max:2048',

            'email_contact_en'               => 'required|email:dns',
            'address_contact_en'             => 'required',
            'phone_no_contact_en'            => 'required|numeric',
            'embeded_map_url_contact_en'     => 'required|url',

            'meta_name_common_en'           => 'required',
            'meta_desciption_common_en'     => 'required',
            'meta_keyword_common_en'         => 'required',
            'feature_img_common_en'  => 'mimes:jpeg,jpg,png,webp|max:2048',

            'address_footer_ar'         => 'required',
            'address_contact_ar'         => 'required',
            'address_footer_fr'         => 'required',
            'address_contact_fr'         => 'required',
            'address_footer_ru'         => 'required',
            'address_contact_ru'         => 'required',

            'whatsapp_no_whatsapp_section_en'             => 'required|numeric',
            'whatsapp_no_whatsapp_section_ar'             => 'required|numeric',
            'whatsapp_no_whatsapp_section_fr'             => 'required|numeric',
            'whatsapp_no_whatsapp_section_ru'             => 'required|numeric',

            'meta_name_common_ar'       => 'required',
            'meta_desciption_common_ar'     => 'required',
            'meta_keyword_common_ar'         => 'required',
            'meta_name_common_fr'       => 'required',
            'meta_desciption_common_fr'     => 'required',
            'meta_keyword_common_fr'         => 'required',
            'meta_name_common_ru'       => 'required',
            'meta_desciption_common_ru'     => 'required',
            'meta_keyword_common_ru'         => 'required',

            'name_quick_link_en.*'           => 'required|max:255',
            'val_quick_link_en.*'            => 'required',
            'name_quick_link_ar.*'           => 'required|max:255',
            'val_quick_link_ar.*'            => 'required',
            'name_quick_link_fr.*'           => 'required|max:255',
            'val_quick_link_fr.*'            => 'required',
            'name_quick_link_ru.*'           => 'required|max:255',
            'val_quick_link_ru.*'            => 'required',

            'name_sec_one_q_link_en.*'       => 'required|max:255',
            'val_sec_one_q_link_en.*'        => 'required',
            'name_sec_one_q_link_ar.*'       => 'required|max:255',
            'val_sec_one_q_link_ar.*'        => 'required',
            'name_sec_one_q_link_fr.*'       => 'required|max:255',
            'val_sec_one_q_link_fr.*'        => 'required',
            'name_sec_one_q_link_ru.*'       => 'required|max:255',
            'val_sec_one_q_link_ru.*'        => 'required',

            'name_sec_second_q_link_en.*'    => 'required|max:255',
            'val_sec_second_q_link_en.*'     => 'required',
            'name_sec_second_q_link_ar.*'    => 'required|max:255',
            'val_sec_second_q_link_ar.*'     => 'required',
            'name_sec_second_q_link_fr.*'    => 'required|max:255',
            'val_sec_second_q_link_fr.*'     => 'required',
            'name_sec_second_q_link_ru.*'    => 'required|max:255',
            'val_sec_second_q_link_ru.*'     => 'required',
        ],
            [
            'logo_en.required'              => __('car.logo_en_required'),
            'email_en.required'             => __('car.email_en_required'),
            'email_en.email'                => __('car.email_en_email'),
            'logo_en.mimes'                 => __('car.logo_en_mimes'),
            'logo_en.max'                   => __('car.logo_en_max'),
            'facebook_url_en.required'      => __('car.facebook_url_en_required'),
            'facebook_url_en.url'           => __('car.facebook_url_en_url'),
            'instagram_url_en.required'     => __('car.instagram_url_en_required'),
            'instagram_url_en.url'          => __('car.instagram_url_en_url'),
            'snapchat_url_en.required'      => __('car.snapchat_url_en_required'),
            'snapchat_url_en.url'           => __('car.snapchat_url_en_url'),
            'youtube_url_en.required'       => __('car.youtube_url_en_required'),
            'youtube_url_en.url'            => __('car.youtube_url_en_url'),
            'linkedin_url_en.required'      => __('car.linkedin_url_en_required'),
            'linkedin_url_en.url'           => __('car.linkedin_url_en_url'),
            'twitter_url_en.required'       => __('car.twitter_url_en_required'),
            'twitter_url_en.url'            => __('car.twitter_url_en_url'),
            'apple_link_en.required'        => __('car.apple_link_en_required'),
            'apple_link_en.url'             => __('car.apple_link_en_url'),
            'apple_image_en.required'       => __('car.apple_image_en_required'),
            'apple_image_en.mimes'          => __('car.apple_image_en_mimes'),
            'apple_image_en.max'            => __('car.apple_image_en_max'),
            'google_play_link_en.required'  => __('car.google_play_link_en_required'),
            'google_play_link_en.url'       => __('car.google_play_link_en_url'),
            'google_play_image_en.required' => __('car.google_play_image_en_required'),
            'google_play_image_en.mimes'    => __('car.google_play_image_en_mimes'),
            'google_play_image_en.max'      => __('car.google_play_image_en_max'),

            'logo_footer_en.required'               => __('car.logo_footer_en_required'),
            'logo_footer_en.max'                    => __('car.logo_footer_en_max'),
            'logo_footer_en.mimes'                  => __('car.logo_footer_en_mimes'),
            'address_footer_en.required'            => __('car.address_footer_en_required'),
            'email_footer_en.required'              => __('car.email_footer_en_required'),
            'email_footer_en.email'                 => __('car.email_footer_en_email'),
            'phone_no_footer_en.required'           => __('car.phone_no_footer_en_required'),
            'phone_no_footer_en.numeric'            => __('car.phone_no_footer_en_numeric'),
            'embeded_map_url_footer_en.required'    => __('car.embeded_map_url_en_required'),
            'embeded_map_url_footer_en.url'         => __('car.embeded_map_url_en_url'),
                'facebook_url_footer_en.required'   => __('car.facebook_url_footer_en_required'),
                'facebook_url_footer_en.url'        => __('car.facebook_url_footer_en_url'),
                'instagram_url_footer_en.required'  => __('car.instagram_url_footer_en_required'),
                'instagram_url_footer_en.url'       => __('car.instagram_url_footer_en_url'),
                'snapchat_url_footer_en.required'   => __('car.snapchat_url_footer_en_required'),
                'snapchat_url_footer_en.url'        => __('car.snapchat_url_footer_en_url'),
                'youtube_url_footer_en.required'    => __('car.youtube_url_footer_en_required'),
                'youtube_url_footer_en.url'         => __('car.youtube_url_footer_en_url'),
                'linkedin_url_footer_en.required'   => __('car.linkedin_url_footer_en_required'),
                'linkedin_url_footer_en.url'        => __('car.linkedin_url_footer_en_url'),
                'twitter_url_footer_en.required'    => __('car.twitter_url_footer_en_required'),
                'twitter_url_footer_en.url'         => __('car.twitter_url_footer_en_url'),
                'apple_link_footer_en.required'     => __('car.apple_link_footer_en_required'),
                'apple_link_footer_en.url'          => __('car.apple_link_footer_en_url'),
                'apple_image_footer_en.required'    => __('car.apple_image_footer_en_required'),
                'apple_image_footer_en.mimes'       => __('car.apple_image_footer_en_mimes'),
                'google_play_link_footer_en.required' => __('car.google_play_link_footer_en_required'),
                'google_play_link_footer_en.url'     => __('car.google_play_link_footer_en_url'),
                'google_play_image_footer_en.required'=> __('car.google_play_image_footer_en_required'),
                'google_play_image_footer_en.mimes'  => __('car.google_play_image_footer_en_mimes'),
                'google_play_image_footer_en.max'    => __('car.google_play_image_footer_en_max'),


                'admin_email_contact_en.required'               => __('car.admin_email_contact_en_required'),
                'admin_email_contact_en.email'                  => __('car.admin_email_contact_en_email'),
                'address_contact_en.required'                   => __('car.address_contact_en_required'),
                'phone_no_contact_en.required'                  => __('car.phone_no_contact_en_required'),
                'phone_no_contact_en.numeric'                   => __('car.phone_no_contact_en_numeric'),
                'embeded_map_url_contact_en.required'           => __('car.embeded_map_url_contact_en_required'),
                'embeded_map_url_contact_en.url'                => __('car.embeded_map_url_contact_en_url'),


                'meta_site_name_common_en.required'              => __('car.meta_site_name_common_en_required'),
                'meta_description_common_en.required'            => __('car.meta_description_common_en_required'),
                'meta_keyword_common_en.required'                => __('car.meta_keyword_common_en_required'),
                // 'feature_img_common_en.required'                        => __('settings.feature_img_common_en_required'),
                'feature_img_common_en.mimes'                           => __('settings.feature_image_en_mimes'),
                'feature_img_common_en.max'                             => __('settings.feature_image_en_max'),


                'address_footer_ar.required'                 => __('car.address_footer_ar_required'),
                'address_contact_ar.required'                => __('car.address_contact_ar_required'),
                'address_footer_fr.required'                 => __('car.address_footer_fr_required'),
                'address_contact_fr.required'                => __('car.address_contact_fr_required'),
                'address_footer_ru.required'                 => __('car.address_footer_ru_required'),
                'address_contact_ru.required'                => __('car.address_contact_ru_required'),

                'whatsapp_no_whatsapp_section_en.required'                       => __('settings.whatsapp_no_en_required'),
                'whatsapp_no_whatsapp_section_ar.required'                       =>__('settings.whatsapp_no_ar_required'),
                'whatsapp_no_whatsapp_section_fr.required'                      =>__('settings.whatsapp_no_fr_required'),
                'whatsapp_no_whatsapp_section_ru.required'                      =>__('settings.whatsapp_no_ru_required'),

                'whatsapp_no_whatsapp_section_en.numeric'                   => __('settings.whatsapp_no_en_numeric'),
                'whatsapp_no_whatsapp_section_ar.numeric'                   => __('settings.whatsapp_no_ar_numeric'),
                'whatsapp_no_whatsapp_section_fr.numeric'                   => __('settings.whatsapp_no_fr_numeric'),
                'whatsapp_no_whatsapp_section_ru.numeric'                   => __('settings.whatsapp_no_ru_numeric'),



                'meta_site_name_common_ar.required'              => __('car.meta_site_name_common_ar_required'),
                'meta_description_common_ar.required'            => __('car.meta_description_common_ar_required'),
                'meta_keyword_common_ar.required'                => __('car.meta_keyword_common_ar_required'),
                'meta_site_name_common_fr.required'              => __('car.meta_site_name_common_fr_required'),
                'meta_description_common_fr.required'            => __('car.meta_description_common_fr_required'),
                'meta_keyword_common_fr.required'                => __('car.meta_keyword_common_fr_required'),
                'meta_site_name_common_ru.required'              => __('car.meta_site_name_common_ru_required'),
                'meta_description_common_ru.required'            => __('car.meta_description_common_ru_required'),
                'meta_keyword_common_ru.required'                => __('car.meta_keyword_common_ru_required'),


                'name_quick_link_en.*.required'             => __('car.name_quick_link_en_*_required'),
                'val_quick_link_en.*.required'              => __('car.val_quick_link_en_*_required'),
                'val_quick_link_en.*.url'                   => __('car.val_quick_link_en_*_url'),
                'name_quick_link_ar.*.required'             => __('car.name_quick_link_ar_*_required'),
                'val_quick_link_ar.*.url'                   => __('car.val_quick_link_ar_*_url'),
                'val_quick_link_ar.*.required'              => __('car.val_quick_link_ar_*_required'),
                'name_quick_link_fr.*.required'             => __('car.name_quick_link_fr_*_required'),
                'val_quick_link_fr.*.url'                   => __('car.val_quick_link_fr_*_url'),
                'val_quick_link_fr.*.required'              => __('car.val_quick_link_fr_*_required'),
                'name_quick_link_ru.*.required'             => __('car.name_quick_link_ru_*_required'),
                'val_quick_link_ru.*.url'                   => __('car.val_quick_link_ru_*_url'),
                'val_quick_link_ru.*.required'              => __('car.val_quick_link_ru_*_required'),

                'name_sec_one_q_link_en.*.required'             => __('car.meta_keyword_common_ru_required'),
                'val_sec_one_q_link_en.*.required'              => __('car.val_quick_link_en_*_required'),
                'val_sec_one_q_link_en.*.url'                   => __('car.val_quick_link_en_*_url'),
                'name_sec_one_q_link_ar.*.required'             => __('car.name_quick_link_ar_*_required'),
                'val_sec_one_q_link_ar.*.url'                   => __('car.val_quick_link_ar_*_url'),
                'val_sec_one_q_link_ar.*.required'              => __('car.val_quick_link_ar_*_required'),
                'name_sec_one_q_link_fr.*.required'             => __('car.name_quick_link_fr_*_required'),
                'val_sec_one_q_link_fr.*.url'                   => __('car.val_quick_link_fr_*_url'),
                'val_sec_one_q_link_fr.*.required'              => __('car.val_quick_link_fr_*_required'),
                'name_sec_one_q_link_ru.*.required'             => __('car.name_quick_link_ru_*_required'),
                'val_sec_one_q_link_ru.*.url'                   => __('car.val_quick_link_ru_*_url'),
                'val_sec_one_q_link_ru.*.required'              => __('car.val_quick_link_ru_*_required'),

                'name_sec_second_q_link_en.*.required'             => __('car.meta_keyword_common_ru_required'),
                'val_sec_second_q_link_en.*.required'              => __('car.val_quick_link_en_*_required'),
                'val_sec_second_q_link_en.*.url'                   => __('car.val_quick_link_en_*_url'),
                'name_sec_second_q_link_ar.*.required'             => __('car.name_quick_link_ar_*_required'),
                'val_sec_second_q_link_ar.*.url'                   => __('car.val_quick_link_ar_*_url'),
                'val_sec_second_q_link_ar.*.required'              => __('car.val_quick_link_ar_*_required'),
                'name_sec_second_q_link_fr.*.required'             => __('car.name_quick_link_fr_*_required'),
                'val_sec_second_q_link_fr.*.url'                   => __('car.val_quick_link_fr_*_url'),
                'val_sec_second_q_link_fr.*.required'              => __('car.val_quick_link_fr_*_required'),
                'name_sec_second_q_link_ru.*.required'             => __('car.name_quick_link_ru_*_required'),
                'val_sec_second_q_link_ru.*.url'                   => __('car.val_quick_link_ru_*_url'),
                'val_sec_second_q_link_ru.*.required'              => __('car.val_quick_link_ru_*_required'),

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
            $data = $request->all();

            $setting_data=Setting::where('section','whatsapp_section')->first();
            if(empty($setting_data)){
                $get_id= Setting::create([
                    'type' => 'whatsapp_number',
                    'section' => 'whatsapp_section',
                    'is_only_english' => 'no',
                ]);
            }
            $get_id= Setting::where('section','whatsapp_section')->first();

            $feature_get_id= Setting::where('section','common')->where('type','feature_image')->first();
            if(empty($feature_get_id)){
                $common_get_id= Setting::create([
                    'type' => 'feature_image',
                    'section' => 'common',
                    'is_only_english' => 'yes',
                ]);
            }
            $common_get_id= Setting::where('section','common')->where('type','feature_image')->first();

            $custom_css_code_block=Setting::where('section','custom_code')->where('type','custom_css')->first();
            if(empty($custom_css_code_block)){
                $custom_css_code_get_id= Setting::create([
                    'type' => 'custom_css',
                    'section' => 'custom_code',
                    'is_only_english' => 'yes',
                ]);
                Cache::forget('custom_css-en');
                Cache::forget('custom_css-ar');
                Cache::forget('custom_css-fr');
                Cache::forget('custom_css-ru');
            }
            $custom_css_code_get_id= Setting::where('section','custom_code')->where('type','custom_css')->first();

            $custom_js_code_block=Setting::where('section','custom_code')->where('type','custom_js')->first();
            if(empty($custom_js_code_block)){
                $custom_js_code_get_id= Setting::create([
                    'type' => 'custom_js',
                    'section' => 'custom_code',
                    'is_only_english' => 'yes',
                ]);
                Cache::forget('custom_js-en');
                Cache::forget('custom_js-ar');
                Cache::forget('custom_js-fr');
                Cache::forget('custom_js-ru');
            }
            $custom_js_code_get_id= Setting::where('section','custom_code')->where('type','custom_js')->first();

            $google_analytic =Setting::where('section','google_analytics')->where('type','google_analytic')->first();
            if(empty($google_analytic)){
                $google_analytic_id= Setting::create([
                    'type' => 'google_analytic',
                    'section' => 'google_analytics',
                    'is_only_english' => 'yes',
                ]);
            }
            $google_analytic_id =Setting::where('section','google_analytics')->where('type','google_analytic')->first();

            foreach ($data as $key => $val) {

                $arr = explode(',', $key);
                // dd($arr);

                if (strpos($key, 'en') !== false && (strpos($key, 'quick_link') !== false || strpos($key, 'sec_one_q_link') !== false || strpos($key, 'sec_second_q_link') !== false)) {
                    if (strpos($key, 'quick_link') !== false && strpos($key, 'name') !== false) {
                        //delete quick link
                        $delete_quick_link_id = $request->delete_quick_link_id;
                        $delete_quick_lin_arr = explode(',', $delete_quick_link_id);

                        if ($request->delete_quick_link_id != NULL) {
                            foreach ($delete_quick_lin_arr as $delete_quick_link) {
                                $quick_link_set = Setting::find($delete_quick_link);

                                $quick_lin_trans = SettingTranslation::where('setting_id', $delete_quick_link)->get();
                                if (!empty($quick_lin_trans)) {
                                    foreach ($quick_lin_trans as $quick) {
                                        if (!empty($quick)) {
                                            $quick->delete();
                                        }
                                    }
                                }
                                if (!empty($quick_link_set)) {
                                    $quick_link_set->delete();
                                }
                            }
                        }
                        $field_name = explode('_quick_link', $key);
                        if ($field_name[0] == 'name') {
                            $quick_name = $request->input($key);
                            $quick_value = $request->input('val_quick_link_en');
                            $quick_name_ar = $request->input('name_quick_link_ar');
                            $quick_name_fr = $request->input('name_quick_link_fr');
                            $quick_name_ru = $request->input('name_quick_link_ru');
                            //$quick_value_ar =  $request->input('val_quick_link_ar');
                            $quick_id = $request->input('quick_link_id_en');

                            foreach ($quick_name as $i => $col) {
                                $val = $quick_value[$i];
                                if (isset($quick_id[$i]) && $quick_id[$i] != NULL) {
                                    $translate = SettingTranslation::
                                    leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                                        ->select('settings.*')
                                        ->where('setting_translations.locale', 'en')
                                        ->where('settings.id', $quick_id[$i])
                                        ->where('settings.section', 'header')
                                        ->first();

                                    if (!empty($translate) && !empty(Setting::find($translate->id))) {
                                        Setting::find($translate->id)->update([
                                            'en' => ['name' => $col, 'val' => $val],
                                        ]);
                                    }
                                } else {
                                    $setting = Setting::create([
                                        'en' => ['name' => $col, 'val' => $val],
                                        'ar' => ['name' => isset($quick_name_ar[$i]) ? $quick_name_ar[$i] : '',
                                            'val' => $val],
                                        'fr' => ['name' => isset($quick_name_fr[$i]) ? $quick_name_fr[$i] : '',
                                            'val' => $val],
                                        'ru' => ['name' => isset($quick_name_ru[$i]) ? $quick_name_ru[$i] : '',
                                            'val' => $val],
                                        'type' => 'quick_link',
                                        'section' => 'header',
                                        'is_only_english' => 'no',
                                    ]);
                                }

                            }
                        }
                    }
                    if (strpos($key, 'sec_one_q_link') !== false && strpos($key, 'name') !== false) {
                        //delete first row link
                        $delete_sec_one_q_link_id = $request->delete_sec_one_q_link_id;
                        $delete_sec_one_q_link_arr = explode(',', $delete_sec_one_q_link_id);

                        if ($request->delete_sec_one_q_link_id != NULL) {
                            foreach ($delete_sec_one_q_link_arr as $delete_sec_one_q_link) {
                                $sec_one_q_set = Setting::find($delete_sec_one_q_link);

                                $sec_one_q_trans = SettingTranslation::where('setting_id', $sec_one_q_set)->get();
                                if (!empty($sec_one_q_trans)) {
                                    foreach ($sec_one_q_trans as $row) {
                                        if (!empty($row)) {
                                            $row->delete();
                                        }
                                    }
                                }
                                if (!empty($sec_one_q_set)) {
                                    $sec_one_q_set->delete();
                                }
                            }
                        }

                        $field_name = explode('_sec_one_q_link', $key);
                        if ($field_name[0] == 'name') {
                            $quick_name = $request->input($key);
                            $quick_value = $request->input('val_sec_one_q_link_en');
                            $quick_name_ar = $request->input('name_sec_one_q_link_ar');
                            $quick_name_fr = $request->input('name_sec_one_q_link_fr');
                            $quick_name_ru = $request->input('name_sec_one_q_link_ru');
                            $quick_id = $request->input('sec_one_q_link_id_en');
                            foreach ($quick_name as $i => $col) {
                                $val = $quick_value[$i];
                                if (isset($quick_id[$i]) && $quick_id[$i] != NULL) {
                                    $translate = SettingTranslation::
                                    leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                                        ->select('settings.*')
                                        ->where('setting_translations.locale', 'en')
                                        ->where('settings.id', $quick_id[$i])
                                        ->where('settings.section', 'footer')
                                        ->first();
                                    if (!empty($translate) && !empty(Setting::find($translate->id))) {
                                        Setting::find($translate->id)->update([
                                            'en' => ['name' => $col, 'val' => $val],
                                        ]);
                                    }
                                } else {
                                    Setting::create([
                                        'en' => ['name' => $col, 'val' => $val],
                                        'ar' => ['name' => isset($quick_name_ar[$i]) ? $quick_name_ar[$i] : '',
                                            'val' => $val],
                                        'fr' => ['name' => isset($quick_name_fr[$i]) ? $quick_name_fr[$i] : '',
                                            'val' => $val],
                                        'ru' => ['name' => isset($quick_name_ru[$i]) ? $quick_name_ru[$i] : '',
                                            'val' => $val],
                                        'type' => 'sec_one_q_link',
                                        'section' => 'footer',
                                        'is_only_english' => 'no',
                                    ]);
                                }

                            }
                        }
                    }
                    if (strpos($key, 'sec_second_q_link') !== false && strpos($key, 'name') !== false) {

                        //delete second row link
                        $delete_sec_second_q_link_id = $request->delete_sec_second_q_link_id;
                        $delete_sec_second_q_link_arr = explode(',', $delete_sec_second_q_link_id);

                        if ($request->delete_sec_second_q_link_id != NULL) {
                            foreach ($delete_sec_second_q_link_arr as $delete_sec_second_q_link) {
                                $sec_one_q_set = Setting::find($delete_sec_second_q_link);

                                $sec_one_q_trans = SettingTranslation::where('setting_id', $sec_one_q_set)->get();
                                if (!empty($sec_one_q_trans)) {
                                    foreach ($sec_one_q_trans as $row) {
                                        if (!empty($row)) {
                                            $row->delete();
                                        }
                                    }
                                }
                                if (!empty($sec_one_q_set)) {
                                    $sec_one_q_set->delete();
                                }
                            }
                        }

                        $field_name = explode('_sec_second_q_link', $key);
                        if ($field_name[0] == 'name') {
                            $quick_name = $request->input($key);
                            $quick_value = $request->input('val_sec_second_q_link_en');
                            $quick_name_ar = $request->input('val_sec_second_q_link_ar');
                            $quick_name_fr = $request->input('val_sec_second_q_link_fr');
                            $quick_name_ru = $request->input('val_sec_second_q_link_ru');
                            $quick_id = $request->input('sec_second_q_link_id_en');
                            foreach ($quick_name as $i => $col) {
                                $val = $quick_value[$i];
                                if (isset($quick_id[$i]) && $quick_id[$i] != NULL) {
                                    $translate = SettingTranslation::
                                    leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                                        ->select('settings.*')
                                        ->where('setting_translations.locale', 'en')
                                        ->where('settings.id', $quick_id[$i])
                                        ->where('settings.section', 'footer')
                                        ->first();
                                    if (!empty($translate) && !empty(Setting::find($translate->id))) {
                                        Setting::find($translate->id)->update([
                                            'en' => ['name' => $col, 'val' => $val],
                                        ]);
                                    }
                                } else {

                                    Setting::create([
                                        'en' => ['name' => $col, 'val' => $val],
                                        'ar' => ['name' => isset($quick_name_ar[$i]) ? $quick_name_ar[$i] : '',
                                            'val' => $val],
                                        'fr' => ['name' => isset($quick_name_fr[$i]) ? $quick_name_fr[$i] : '',
                                            'val' => $val],
                                        'ru' => ['name' => isset($quick_name_ru[$i]) ? $quick_name_ru[$i] : '',
                                            'val' => $val],
                                        'type' => 'sec_second_q_link',
                                        'section' => 'footer',
                                        'is_only_english' => 'no',
                                    ]);
                                }

                            }
                        }
                    }

                } else if (strpos($key, 'en') !== false && strpos($key, 'token') == false && strpos($key, 'quick_link') == false && strpos($key, 'sec_one_q_link') == false && strpos($key, 'sec_second_q_link') == false) {
                    // dd('else if');
                    if (strpos($key, 'footer') !== false) {
                        $field_name = explode('_footer', $key);

                        $translate = SettingTranslation::
                        leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                            ->select('settings.*')
                            ->where('setting_translations.name', $field_name[0])
                            ->where('setting_translations.locale', 'en')
                            ->where('settings.section', 'footer')
                            ->first();

                        if (strpos($field_name[0], 'logo') !== false || strpos($field_name[0], 'image') !== false) {
                            //upload image
                            if ($request->hasFile($key)) {
                                $image = $request->file($key);

                                $image_name = uploadImage('frontend/image', $image,"",null,true);

                                // $image_name = time() . $key . '.' . $image->getClientOriginalExtension();
                                // $image->move(base_path('public/frontend/image'), $image_name);

                                if (!empty($translate) && !empty(Setting::find($translate->id))) {
                                    Setting::find($translate->id)->update([
                                        'en' => ['val' => $image_name]
                                    ]);
                                }
                            }
                        } else {
                            if (!empty($translate) && !empty(Setting::find($translate->id))) {
                                Setting::find($translate->id)->update([
                                    'en' => ['val' => $val]
                                ]);
                            }
                        }
                    } else if (strpos($key, 'contact') !== false) {

                        $field_name = explode('_contact', $key);
                        // dd($field_name);
                        $translate = SettingTranslation::
                        leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                            ->select('settings.*')
                            ->where('setting_translations.name', $field_name[0])
                            ->where('setting_translations.locale', 'en')
                            ->where('settings.section', 'contact_us')
                            ->first();
                        if (!empty($translate) && !empty(Setting::find($translate->id))) {
                            Setting::find($translate->id)->update([
                                'en' => ['val' => $val]
                            ]);
                        }
                    } else if (strpos($key, 'common') !== false) {
                        $field_name = explode('_common', $key);

                        $translate = SettingTranslation::
                                    leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                                    ->select('settings.*')
                                    ->where('setting_translations.name', $field_name[0])
                                    ->where('setting_translations.locale', 'en')
                                    ->where('settings.section', 'common')
                                    ->first();
                            if (!empty($translate) && !empty(Setting::find($translate->id))) {
                            Setting::find($translate->id)->update([

                                'en' => ['val' => $val]
                            ]);
                        }
                        else{

                            if ($request->hasFile($key)) {
                                $image = $request->file($key);
                                $image_name = uploadImage('frontend/image', $image,"",null,true);

                                // $image_name = time() . $key . '.' . $image->getClientOriginalExtension();
                                // $image->move(base_path('public/frontend/image'), $image_name);
                                if(!empty($common_get_id)){
                                    $setting_translation_id=SettingTranslation::where('setting_id',$common_get_id->id)->first();
                                }

                                if (!empty($setting_translation_id->id)) {
                                    SettingTranslation::where('setting_id',$common_get_id->id)->update([
                                        'val' => $image_name
                                    ]);
                                }
                                else{
                                    SettingTranslation::create([
                                        'setting_id'=>$common_get_id->id,
                                        'locale' => 'en',
                                        'name' => 'feature_image',
                                        'val' =>  $image_name,
                                    ]);
                                }
                            }

                        }
                    }
                    else if (strpos($key, 'whatsapp_section') !== false) {
                        $field_name = explode('_whatsapp_section', $key);
                        // dd($field_name);
                        $translate = SettingTranslation::
                        leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                            ->select('settings.*')
                            // ->where('setting_translations.name', $field_name)
                            ->where('setting_translations.locale', 'en')
                            ->where('settings.section', 'whatsapp_section')
                            ->first();
                        if (!empty($translate) && !empty(Setting::find($translate->id))) {
                            Setting::find($translate->id)->update([
                                'en' => ['val' => $val]
                            ]);
                        }
                        else{
                            SettingTranslation::create([
                                'setting_id'=>$get_id->id,
                                'locale' => 'en',
                                'name' => 'whatsapp_number',
                                'val' => $request->input('whatsapp_no_whatsapp_section_en'),
                            ]);
                        }
                    }
                    else if (strpos($key, 'google_analytics_section') !== false) {
                        $field_name = explode('_google_analytics', $key);
                        $translate = SettingTranslation::
                        leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                            ->select('settings.*')
                            ->where('setting_translations.locale', 'en')
                            ->where('settings.section', 'google_analytics')
                            ->first();
                        if (!empty($translate) && !empty(Setting::find($translate->id))) {
                            Setting::find($translate->id)->update([
                                'en' => ['val' => $val]
                            ]);
                        }
                        else{
                            SettingTranslation::create([
                                'setting_id'=>$google_analytic_id->id,
                                'locale' => 'en',
                                'name' => 'google_analytic',
                                'val' => $request->input('google_analytics_section_en'),
                            ]);
                        }
                    }
                    else if (strpos($key, 'custom_code_section') !== false) {
                        $field_name = explode('_custom_code_section', $key);
                        $translate = SettingTranslation::
                                    leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                                    ->select('settings.*')
                                    ->where('setting_translations.name', $field_name[0])
                                    ->where('setting_translations.locale', 'en')
                                    ->where('settings.section', 'custom_code')
                                    ->first();

                            if (!empty($translate) && !empty(Setting::find($translate->id))) {
                                Setting::find($translate->id)->update([

                                    'en' => ['val' => $val]
                                ]);
                            }
                            else{
                                if(!empty($custom_css_code_get_id->id)){
                                    SettingTranslation::create([
                                        'setting_id'=>$custom_css_code_get_id->id,
                                        'locale' => 'en',
                                        'name' => 'custom_css',
                                        'val' => $request->input('custom_css_custom_code_section_en'),
                                    ]);
                                    Cache::forget('custom_css-en');
                                    Cache::forget('custom_css-ar');
                                    Cache::forget('custom_css-fr');
                                    Cache::forget('custom_css-ru');
                                }
                                if(!empty($custom_js_code_get_id->id)){
                                    SettingTranslation::create([
                                        'setting_id'=>$custom_js_code_get_id->id,
                                        'locale' => 'en',
                                        'name' => 'custom_js',
                                        'val' => $request->input('custom_js_custom_code_section_en'),
                                    ]);
                                    Cache::forget('custom_js-en');
                                    Cache::forget('custom_js-ar');
                                    Cache::forget('custom_js-fr');
                                    Cache::forget('custom_js-ru');
                                }
                            }
                    }
                    else {

                        $field_name = explode('_en', $key);
                        $translate = SettingTranslation::
                        leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                            ->select('settings.*')
                            ->where('setting_translations.name', $field_name[0])
                            ->where('setting_translations.locale', 'en')
                            ->where('settings.section', 'header')
                            ->first();

                        if (strpos($field_name[0], 'logo') !== false || strpos($field_name[0], 'image') !== false) {
                            //upload image
                            if ($request->hasFile($key)) {
                                $image = $request->file($key);

                                $image_name = uploadImage('frontend/image', $image,"",null,true);


                                // $image_name = time() . $key . '.' . $image->getClientOriginalExtension();
                                // $image->move(base_path('public/frontend/image'), $image_name);

                                if (!empty($translate) && !empty(Setting::find($translate->id))) {
                                    Setting::find($translate->id)->update([
                                        'en' => ['val' => $image_name]
                                    ]);
                                }
                            }
                        } else {
                            if (!empty($translate) && !empty(Setting::find($translate->id))) {
                                Setting::find($translate->id)->update([
                                    'en' => ['val' => $val]
                                ]);
                            }
                        }
                    }
                }

                if (strpos($key, 'ar') !== false && (strpos($key, 'quick_link') !== false || strpos($key, 'sec_one_q_link') !== false || strpos($key, 'sec_second_q_link') !== false)) {
                    if (strpos($key, 'quick_link') !== false && strpos($key, 'name') !== false) {
                        $field_name = explode('_quick_link', $key);
                        if ($field_name[0] == 'name') {
                            $quick_name = $request->input($key);
                            $quick_name_en = $request->input('name_quick_link_en');
                            $quick_name_fr = $request->input('name_quick_link_fr');
                            $quick_name_ru = $request->input('name_quick_link_ru');
                            $quick_value = $request->input('val_quick_link_ar');
                            $quick_id = $request->input('quick_link_id_ar');
                            foreach ($quick_name as $i => $col) {
                                $val = $quick_value[$i];
                                if (isset($quick_id[$i]) && $quick_id[$i] != NULL) {
                                    $translate = SettingTranslation::
                                    leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                                        ->select('settings.*')
                                        ->where('setting_translations.locale', 'ar')
                                        ->where('settings.id', $quick_id[$i])
                                        ->where('settings.section', 'header')
                                        ->first();
                                    if (!empty($translate) && !empty(Setting::find($translate->id))) {

                                        Setting::find($translate->id)->update([
                                            'ar' => ['name' => $col, 'val' => $val],
                                        ]);

                                    }
                                }
                                else {
                                    if(!isset($quick_name_en[$i]) && !isset($quick_name_fr[$i]) && !isset($quick_name_ru[$i])) {
                                        $setting = Setting::create([
                                            'ar' => ['name' => $col, 'val' => $val],
                                            'en' => ['name' => isset($quick_name_en[$i]) ? $quick_name_en[$i] : '',
                                                'val' => $val],
                                            'fr' => ['name' => isset($quick_name_fr[$i]) ? $quick_name_fr[$i] : '',
                                                'val' => $val],
                                            'ru' => ['name' => isset($quick_name_ru[$i]) ? $quick_name_ru[$i] : '',
                                                'val' => $val],
                                            'type' => 'quick_link',
                                            'section' => 'header',
                                            'is_only_english' => 'no',
                                        ]);
                                    }
                                }
                            }
                        }
                    }
                    if (strpos($key, 'sec_one_q_link') !== false && strpos($key, 'name') !== false) {
                        $field_name = explode('_sec_one_q_link', $key);
                        if ($field_name[0] == 'name') {
                            $quick_name = $request->input($key);
                            $quick_name_en = $request->input('name_sec_one_q_link_en');
                            $quick_name_fr = $request->input('name_sec_one_q_link_fr');
                            $quick_name_ru = $request->input('name_sec_one_q_link_ru');
                            $quick_value = $request->input('val_sec_one_q_link_ar');
                            $quick_id = $request->input('sec_one_q_link_id_ar');
                            foreach ($quick_name as $i => $col) {
                                $val = $quick_value[$i];
                                if (isset($quick_id[$i]) && $quick_id[$i] != NULL) {
                                    $translate = SettingTranslation::
                                    leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                                        ->select('settings.*')
                                        ->where('setting_translations.locale', 'ar')
                                        ->where('settings.id', $quick_id[$i])
                                        ->where('settings.section', 'footer')
                                        ->first();
                                    if (!empty($translate) && !empty(Setting::find($translate->id))) {
                                        Setting::find($translate->id)->update([
                                            'ar' => ['name' => $col, 'val' => $val],
                                        ]);
                                    }
                                }
                                else {
                                    if(!isset($quick_name_en[$i]) && !isset($quick_name_fr[$i]) && !isset($quick_name_ru[$i])) {
                                        $setting = Setting::create([
                                            'ar' => ['name' => $col, 'val' => $val],
                                            'en' => ['name' => isset($quick_name_en[$i]) ? $quick_name_en[$i] : '',
                                                'val' => $val],
                                            'fr' => ['name' => isset($quick_name_fr[$i]) ? $quick_name_fr[$i] : '',
                                                'val' => $val],
                                            'ru' => ['name' => isset($quick_name_ru[$i]) ? $quick_name_ru[$i] : '',
                                                'val' => $val],
                                            'type' => 'quick_link',
                                            'section' => 'header',
                                            'is_only_english' => 'no',
                                        ]);
                                    }
                                }
                            }
                        }
                    }
                    if (strpos($key, 'sec_second_q_link') !== false && strpos($key, 'name') !== false) {
                        $field_name = explode('_sec_second_q_link', $key);
                        if ($field_name[0] == 'name') {
                            $quick_name = $request->input($key);
                            $quick_name_en = $request->input('val_sec_second_q_link_en');
                            $quick_name_fr = $request->input('val_sec_second_q_link_fr');
                            $quick_name_ru = $request->input('val_sec_second_q_link_ru');
                            $quick_value = $request->input('val_sec_second_q_link_ar');
                            $quick_id = $request->input('sec_second_q_link_id_ar');
                            foreach ($quick_name as $i => $col) {
                                $val = $quick_value[$i];
                                if (isset($quick_id[$i]) && $quick_id[$i] != NULL) {
                                    $translate = SettingTranslation::
                                    leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                                        ->select('settings.*')
                                        ->where('setting_translations.locale', 'ar')
                                        ->where('settings.id', $quick_id[$i])
                                        ->where('settings.section', 'footer')
                                        ->first();
                                    if (!empty($translate) && !empty(Setting::find($translate->id))) {
                                        Setting::find($translate->id)->update([
                                            'ar' => ['name' => $col, 'val' => $val],
                                        ]);
                                    }
                                }
                                else {
                                    if(!isset($quick_name_en[$i]) && !isset($quick_name_fr[$i]) && !isset($quick_name_ru[$i])) {
                                        $setting = Setting::create([
                                            'ar' => ['name' => $col, 'val' => $val],
                                            'en' => ['name' => isset($quick_name_en[$i]) ? $quick_name_en[$i] : '',
                                                'val' => $val],
                                            'fr' => ['name' => isset($quick_name_fr[$i]) ? $quick_name_fr[$i] : '',
                                                'val' => $val],
                                            'ru' => ['name' => isset($quick_name_ru[$i]) ? $quick_name_ru[$i] : '',
                                                'val' => $val],
                                            'type' => 'quick_link',
                                            'section' => 'header',
                                            'is_only_english' => 'no',
                                        ]);
                                    }
                                }
                            }
                        }
                    }
                } else if (strpos($key, 'ar') !== false && strpos($key, 'token') == false && strpos($key, 'quick_link') == false && strpos($key, 'sec_one_q_link') == false && strpos($key, 'sec_second_q_link') == false) {
                    if (strpos($key, 'footer') !== false) {
                        $field_name = explode('_footer', $key);
                        $translate = SettingTranslation::
                        leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                            ->select('settings.*')
                            ->where('setting_translations.name', $field_name[0])
                            ->where('setting_translations.locale', 'ar')
                            ->where('settings.section', 'footer')
                            ->first();
                        if (!empty($translate) && !empty(Setting::find($translate->id))) {
                            Setting::find($translate->id)->update([
                                'ar' => ['val' => $val]
                            ]);
                        }
                    } else if (strpos($key, 'contact') !== false) {
                        $field_name = explode('_contact', $key);
                        $translate = SettingTranslation::
                        leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                            ->select('settings.*')
                            ->where('setting_translations.name', $field_name[0])
                            ->where('setting_translations.locale', 'ar')
                            ->where('settings.section', 'contact_us')
                            ->first();
                        if (!empty($translate) && !empty(Setting::find($translate->id))) {
                            Setting::find($translate->id)->update([
                                'ar' => ['val' => $val]
                            ]);
                        }
                    } else if (strpos($key, 'common') !== false) {
                        $field_name = explode('_common', $key);
                        $translate = SettingTranslation::
                        leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                            ->select('settings.*')
                            ->where('setting_translations.name', $field_name[0])
                            ->where('setting_translations.locale', 'ar')
                            ->where('settings.section', 'common')
                            ->first();
                        if (!empty($translate) && !empty(Setting::find($translate->id))) {
                            Setting::find($translate->id)->update([
                                'ar' => ['val' => $val]
                            ]);
                        }
                    }
                    else if (strpos($key, 'whatsapp_section') !== false) {
                        $field_name = explode('_whatsapp_section', $key);
                        // dd($field_name);
                        $translate = SettingTranslation::
                        leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                            ->select('settings.*')
                            // ->where('setting_translations.name', $field_name[0])
                            ->where('setting_translations.locale', 'ar')
                            ->where('settings.section', 'whatsapp_section')
                            ->first();
                        if (!empty($translate) && !empty(Setting::find($translate->id))) {
                            Setting::find($translate->id)->update([
                                'ar' => ['val' => $val]
                            ]);
                        }
                        else{
                            SettingTranslation::create([
                                'setting_id'=>$get_id->id,
                                'locale' => 'ar',
                                'name' => 'whatsapp_number',
                                'val' => $request->input('whatsapp_no_whatsapp_section_ar'),
                            ]);
                        }
                    }
                     else {
                        $field_name = explode('_ar', $key);
                        $translate = SettingTranslation::
                        leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                            ->select('settings.*')
                            ->where('setting_translations.name', $field_name[0])
                            ->where('setting_translations.locale', 'ar')
                            ->where('settings.section', 'header')
                            ->first();
                        if (!empty($translate) && !empty(Setting::find($translate->id))) {
                            Setting::find($translate->id)->update([
                                'ar' => ['val' => $val]
                            ]);
                        }
                    }
                }

                if (strpos($key, 'fr') !== false && (strpos($key, 'quick_link') !== false || strpos($key, 'sec_one_q_link') !== false || strpos($key, 'sec_second_q_link') !== false)) {
                    if (strpos($key, 'quick_link') !== false && strpos($key, 'name') !== false) {
                        $field_name = explode('_quick_link', $key);
                        if ($field_name[0] == 'name') {
                            $quick_name_en = $request->input('name_quick_link_en');
                            $quick_name_ar = $request->input('name_quick_link_ar');
                            $quick_name_ru = $request->input('name_quick_link_ru');
                            $quick_name = $request->input($key);
                            $quick_value = $request->input('val_quick_link_fr');
                            $quick_id = $request->input('quick_link_id_fr');
                            foreach ($quick_name as $i => $col) {
                                $val = $quick_value[$i];
                                if (isset($quick_id[$i]) && $quick_id[$i] != NULL) {
                                    $translate = SettingTranslation::
                                    leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                                        ->select('settings.*')
                                        ->where('setting_translations.locale', 'fr')
                                        ->where('settings.id', $quick_id[$i])
                                        ->where('settings.section', 'header')
                                        ->first();
                                    if (!empty($translate) && !empty(Setting::find($translate->id))) {
                                        Setting::find($translate->id)->update([
                                            'fr' => ['name' => $col, 'val' => $val],
                                        ]);
                                    }
                                }
                                else {
                                    if(!isset($quick_name_en[$i]) && !isset($quick_name_ar[$i]) && !isset($quick_name_ru[$i])) {
                                        $setting = Setting::create([
                                            'fr' => ['name' => $col, 'val' => $val],
                                            'en' => ['name' => isset($quick_name_en[$i]) ? $quick_name_en[$i] : '',
                                                'val' => $val],
                                            'ar' => ['name' => isset($quick_name_ar[$i]) ? $quick_name_ar[$i] : '',
                                                'val' => $val],
                                            'ru' => ['name' => isset($quick_name_ru[$i]) ? $quick_name_ru[$i] : '',
                                                'val' => $val],
                                            'type' => 'quick_link',
                                            'section' => 'header',
                                            'is_only_english' => 'no',
                                        ]);
                                    }
                                }

                            }
                        }
                    }
                    if (strpos($key, 'sec_one_q_link') !== false && strpos($key, 'name') !== false) {
                        $field_name = explode('_sec_one_q_link', $key);
                        if ($field_name[0] == 'name') {
                            $quick_name = $request->input($key);
                            $quick_name_ar = $request->input('name_sec_one_q_link_ar');
                            $quick_name_en = $request->input('name_sec_one_q_link_en');
                            $quick_name_ru = $request->input('name_sec_one_q_link_ru');
                            $quick_value = $request->input('val_sec_one_q_link_fr');
                            $quick_id = $request->input('sec_one_q_link_id_fr');
                            foreach ($quick_name as $i => $col) {
                                $val = $quick_value[$i];
                                if (isset($quick_id[$i]) && $quick_id[$i] != NULL) {
                                    $translate = SettingTranslation::
                                    leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                                        ->select('settings.*')
                                        ->where('setting_translations.locale', 'fr')
                                        ->where('settings.id', $quick_id[$i])
                                        ->where('settings.section', 'footer')
                                        ->first();
                                    if (!empty($translate) && !empty(Setting::find($translate->id))) {
                                        Setting::find($translate->id)->update([
                                            'fr' => ['name' => $col, 'val' => $val],
                                        ]);
                                    }
                                }
                                else {
                                    if(!isset($quick_name_en[$i]) && !isset($quick_name_ar[$i]) && !isset($quick_name_ru[$i])) {
                                        $setting = Setting::create([
                                            'fr' => ['name' => $col, 'val' => $val],
                                            'en' => ['name' => isset($quick_name_en[$i]) ? $quick_name_en[$i] : '',
                                                'val' => $val],
                                            'ar' => ['name' => isset($quick_name_ar[$i]) ? $quick_name_ar[$i] : '',
                                                'val' => $val],
                                            'ru' => ['name' => isset($quick_name_ru[$i]) ? $quick_name_ru[$i] : '',
                                                'val' => $val],
                                            'type' => 'quick_link',
                                            'section' => 'header',
                                            'is_only_english' => 'no',
                                        ]);
                                    }
                                }

                            }
                        }
                    }
                    if (strpos($key, 'sec_second_q_link') !== false && strpos($key, 'name') !== false) {
                        $field_name = explode('_sec_second_q_link', $key);
                        if ($field_name[0] == 'name') {
                            $quick_name = $request->input($key);
                            $quick_name_ar = $request->input('val_sec_second_q_link_ar');
                            $quick_name_en = $request->input('val_sec_second_q_link_en');
                            $quick_name_ru = $request->input('val_sec_second_q_link_ru');
                            $quick_value = $request->input('val_sec_second_q_link_fr');
                            $quick_id = $request->input('sec_second_q_link_id_fr');
                            foreach ($quick_name as $i => $col) {
                                $val = $quick_value[$i];
                                if (isset($quick_id[$i]) && $quick_id[$i] != NULL) {
                                    $translate = SettingTranslation::
                                    leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                                        ->select('settings.*')
                                        ->where('setting_translations.locale', 'fr')
                                        ->where('settings.id', $quick_id[$i])
                                        ->where('settings.section', 'footer')
                                        ->first();
                                    if (!empty($translate) && !empty(Setting::find($translate->id))) {
                                        Setting::find($translate->id)->update([
                                            'fr' => ['name' => $col, 'val' => $val],
                                        ]);
                                    }
                                }
                                else {
                                    if(!isset($quick_name_en[$i]) && !isset($quick_name_ar[$i]) && !isset($quick_name_ru[$i])) {
                                        $setting = Setting::create([
                                            'fr' => ['name' => $col, 'val' => $val],
                                            'en' => ['name' => isset($quick_name_en[$i]) ? $quick_name_en[$i] : '',
                                                'val' => $val],
                                            'ar' => ['name' => isset($quick_name_ar[$i]) ? $quick_name_ar[$i] : '',
                                                'val' => $val],
                                            'ru' => ['name' => isset($quick_name_ru[$i]) ? $quick_name_ru[$i] : '',
                                                'val' => $val],
                                            'type' => 'quick_link',
                                            'section' => 'header',
                                            'is_only_english' => 'no',
                                        ]);
                                    }
                                }
                            }
                        }
                    }
                } else if (strpos($key, 'fr') !== false && strpos($key, 'token') == false && strpos($key, 'quick_link') == false && strpos($key, 'sec_one_q_link') == false && strpos($key, 'sec_second_q_link') == false) {
                    if (strpos($key, 'footer') !== false) {
                        $field_name = explode('_footer', $key);
                        $translate = SettingTranslation::
                        leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                            ->select('settings.*')
                            ->where('setting_translations.name', $field_name[0])
                            ->where('setting_translations.locale', 'fr')
                            ->where('settings.section', 'footer')
                            ->first();
                        if (!empty($translate) && !empty(Setting::find($translate->id))) {
                            Setting::find($translate->id)->update([
                                'fr' => ['val' => $val]
                            ]);
                        }
                    } else if (strpos($key, 'contact') !== false) {
                        $field_name = explode('_contact', $key);
                        $translate = SettingTranslation::
                        leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                            ->select('settings.*')
                            ->where('setting_translations.name', $field_name[0])
                            ->where('setting_translations.locale', 'fr')
                            ->where('settings.section', 'contact_us')
                            ->first();
                        if (!empty($translate) && !empty(Setting::find($translate->id))) {
                            Setting::find($translate->id)->update([
                                'fr' => ['val' => $val]
                            ]);
                        }
                    } else if (strpos($key, 'common') !== false) {
                        $field_name = explode('_common', $key);
                        $translate = SettingTranslation::
                        leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                            ->select('settings.*')
                            ->where('setting_translations.name', $field_name[0])
                            ->where('setting_translations.locale', 'fr')
                            ->where('settings.section', 'common')
                            ->first();
                        if (!empty($translate) && !empty(Setting::find($translate->id))) {
                            Setting::find($translate->id)->update([
                                'fr' => ['val' => $val]
                            ]);
                        }
                    }
                    else if (strpos($key, 'whatsapp_section') !== false) {
                        $field_name = explode('_whatsapp_section', $key);
                        // dd($field_name);
                        $translate = SettingTranslation::
                        leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                            ->select('settings.*')
                            // ->where('setting_translations.name', $field_name[0])
                            ->where('setting_translations.locale', 'fr')
                            ->where('settings.section', 'whatsapp_section')
                            ->first();
                        if (!empty($translate) && !empty(Setting::find($translate->id))) {
                            Setting::find($translate->id)->update([
                                'fr' => ['val' => $val]
                            ]);
                        }
                        else{
                            SettingTranslation::create([
                                'setting_id'=>$get_id->id,
                                'locale' => 'fr',
                                'name' => 'whatsapp_number',
                                'val' => $request->input('whatsapp_no_whatsapp_section_fr'),
                            ]);
                        }
                    }
                    else {
                        $field_name = explode('_fr', $key);
                        $translate = SettingTranslation::
                        leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                            ->select('settings.*')
                            ->where('setting_translations.name', $field_name[0])
                            ->where('setting_translations.locale', 'fr')
                            ->where('settings.section', 'header')
                            ->first();
                        if (!empty($translate) && !empty(Setting::find($translate->id))) {
                            Setting::find($translate->id)->update([
                                'fr' => ['val' => $val]
                            ]);
                        }
                    }
                }

                if (strpos($key, 'ru') !== false && (strpos($key, 'quick_link') !== false || strpos($key, 'sec_one_q_link') !== false || strpos($key, 'sec_second_q_link') !== false)) {
                    if (strpos($key, 'quick_link') !== false && strpos($key, 'name') !== false) {
                        $field_name = explode('_quick_link', $key);
                        if ($field_name[0] == 'name') {
                            $quick_name = $request->input($key);
                            $quick_name_en = $request->input('name_quick_link_en');
                            $quick_name_ar = $request->input('name_quick_link_ar');
                            $quick_name_fr = $request->input('name_quick_link_fr');
                            $quick_value = $request->input('val_quick_link_ru');
                            $quick_id = $request->input('quick_link_id_ru');
                            foreach ($quick_name as $i => $col) {
                                $val = $quick_value[$i];
                                if (isset($quick_id[$i]) && $quick_id[$i] != NULL) {
                                    $translate = SettingTranslation::
                                    leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                                        ->select('settings.*')
                                        ->where('setting_translations.locale', 'fr')
                                        ->where('settings.id', $quick_id[$i])
                                        ->where('settings.section', 'header')
                                        ->first();
                                    if (!empty($translate) && !empty(Setting::find($translate->id))) {
                                        Setting::find($translate->id)->update([
                                            'ru' => ['name' => $col, 'val' => $val],
                                        ]);
                                    }
                                }
                                else {
                                    if(!isset($quick_name_en[$i]) && !isset($quick_name_ar[$i]) && !isset($quick_name_fr[$i])) {
                                        $setting = Setting::create([
                                            'ru' => ['name' => $col, 'val' => $val],
                                            'en' => ['name' => isset($quick_name_en[$i]) ? $quick_name_en[$i] : '',
                                                'val' => $val],
                                            'ar' => ['name' => isset($quick_name_ar[$i]) ? $quick_name_ar[$i] : '',
                                                'val' => $val],
                                            'fr' => ['name' => isset($quick_name_fr[$i]) ? $quick_name_fr[$i] : '',
                                                'val' => $val],
                                            'type' => 'quick_link',
                                            'section' => 'header',
                                            'is_only_english' => 'no',
                                        ]);
                                    }
                                }
                            }
                        }
                    }
                    if (strpos($key, 'sec_one_q_link') !== false && strpos($key, 'name') !== false) {
                        $field_name = explode('_sec_one_q_link', $key);
                        if ($field_name[0] == 'name') {
                            $quick_name = $request->input($key);
                            $quick_name_ar = $request->input('name_sec_one_q_link_ar');
                            $quick_name_fr = $request->input('name_sec_one_q_link_fr');
                            $quick_name_en = $request->input('name_sec_one_q_link_en');
                            $quick_value = $request->input('val_sec_one_q_link_ru');
                            $quick_id = $request->input('sec_one_q_link_id_ru');
                            foreach ($quick_name as $i => $col) {
                                $val = $quick_value[$i];
                                if (isset($quick_id[$i]) && $quick_id[$i] != NULL) {
                                    $translate = SettingTranslation::
                                    leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                                        ->select('settings.*')
                                        ->where('setting_translations.locale', 'ru')
                                        ->where('settings.id', $quick_id[$i])
                                        ->where('settings.section', 'footer')
                                        ->first();
                                    if (!empty($translate) && !empty(Setting::find($translate->id))) {
                                        Setting::find($translate->id)->update([
                                            'ru' => ['name' => $col, 'val' => $val],
                                        ]);
                                    }
                                }
                                else {
                                    if(!isset($quick_name_en[$i]) && !isset($quick_name_ar[$i]) && !isset($quick_name_fr[$i])) {
                                        $setting = Setting::create([
                                            'ru' => ['name' => $col, 'val' => $val],
                                            'en' => ['name' => isset($quick_name_en[$i]) ? $quick_name_en[$i] : '',
                                                'val' => $val],
                                            'ar' => ['name' => isset($quick_name_ar[$i]) ? $quick_name_ar[$i] : '',
                                                'val' => $val],
                                            'fr' => ['name' => isset($quick_name_fr[$i]) ? $quick_name_fr[$i] : '',
                                                'val' => $val],
                                            'type' => 'quick_link',
                                            'section' => 'header',
                                            'is_only_english' => 'no',
                                        ]);
                                    }
                                }
                            }
                        }
                    }
                    if (strpos($key, 'sec_second_q_link') !== false && strpos($key, 'name') !== false) {
                        $field_name = explode('_sec_second_q_link', $key);
                        if ($field_name[0] == 'name') {
                            $quick_name = $request->input($key);
                            $quick_name_ar = $request->input('val_sec_second_q_link_ar');
                            $quick_name_fr = $request->input('val_sec_second_q_link_fr');
                            $quick_name_en = $request->input('val_sec_second_q_link_en');
                            $quick_value = $request->input('val_sec_second_q_link_ru');
                            $quick_id = $request->input('sec_second_q_link_id_ru');
                            foreach ($quick_name as $i => $col) {
                                $val = $quick_value[$i];
                                if (isset($quick_id[$i]) && $quick_id[$i] != NULL) {
                                    $translate = SettingTranslation::
                                    leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                                        ->select('settings.*')
                                        ->where('setting_translations.locale', 'ru')
                                        ->where('settings.id', $quick_id[$i])
                                        ->where('settings.section', 'footer')
                                        ->first();
                                    if (!empty($translate) && !empty(Setting::find($translate->id))) {
                                        Setting::find($translate->id)->update([
                                            'ru' => ['name' => $col, 'val' => $val],
                                        ]);
                                    }
                                }
                                else {
                                    if(!isset($quick_name_en[$i]) && !isset($quick_name_ar[$i]) && !isset($quick_name_fr[$i])) {
                                        $setting = Setting::create([
                                            'ru' => ['name' => $col, 'val' => $val],
                                            'en' => ['name' => isset($quick_name_en[$i]) ? $quick_name_en[$i] : '',
                                                'val' => $val],
                                            'ar' => ['name' => isset($quick_name_ar[$i]) ? $quick_name_ar[$i] : '',
                                                'val' => $val],
                                            'fr' => ['name' => isset($quick_name_fr[$i]) ? $quick_name_fr[$i] : '',
                                                'val' => $val],
                                            'type' => 'quick_link',
                                            'section' => 'header',
                                            'is_only_english' => 'no',
                                        ]);
                                    }
                                }
                            }
                        }
                    }
                } else if (strpos($key, 'ru') !== false && strpos($key, 'token') == false && strpos($key, 'quick_link') == false && strpos($key, 'sec_one_q_link') == false && strpos($key, 'sec_second_q_link') == false) {
                    if (strpos($key, 'footer') !== false) {
                        $field_name = explode('_footer', $key);
                        $translate = SettingTranslation::
                        leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                            ->select('settings.*')
                            ->where('setting_translations.name', $field_name[0])
                            ->where('setting_translations.locale', 'ru')
                            ->where('settings.section', 'footer')
                            ->first();
                        if (!empty($translate) && !empty(Setting::find($translate->id))) {
                            Setting::find($translate->id)->update([
                                'ru' => ['val' => $val]
                            ]);
                        }
                    } else if (strpos($key, 'contact') !== false) {
                        $field_name = explode('_contact', $key);
                        $translate = SettingTranslation::
                        leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                            ->select('settings.*')
                            ->where('setting_translations.name', $field_name[0])
                            ->where('setting_translations.locale', 'ru')
                            ->where('settings.section', 'contact_us')
                            ->first();
                        if (!empty($translate) && !empty(Setting::find($translate->id))) {
                            Setting::find($translate->id)->update([
                                'ru' => ['val' => $val]
                            ]);
                        }
                    } else if (strpos($key, 'common') !== false) {
                        $field_name = explode('_common', $key);
                        $translate = SettingTranslation::
                        leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                            ->select('settings.*')
                            ->where('setting_translations.name', $field_name[0])
                            ->where('setting_translations.locale', 'ru')
                            ->where('settings.section', 'common')
                            ->first();
                        if (!empty($translate) && !empty(Setting::find($translate->id))) {
                            Setting::find($translate->id)->update([
                                'ru' => ['val' => $val]
                            ]);
                        }
                    }
                    else if (strpos($key, 'whatsapp_section') !== false) {
                        $field_name = explode('_whatsapp_section', $key);
                        // dd($field_name);
                        $translate = SettingTranslation::
                        leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                            ->select('settings.*')
                            // ->where('setting_translations.name', $field_name[0])
                            ->where('setting_translations.locale', 'ru')
                            ->where('settings.section', 'whatsapp_section')
                            ->first();
                        if (!empty($translate) && !empty(Setting::find($translate->id))) {
                            Setting::find($translate->id)->update([
                                'ru' => ['val' => $val]
                            ]);
                        }
                        else{
                            SettingTranslation::create([
                                'setting_id'=>$get_id->id,
                                'locale' => 'ru',
                                'name' => 'whatsapp_number',
                                'val' => $request->input('whatsapp_no_whatsapp_section_ru'),
                            ]);
                        }
                    }
                    else {
                        $field_name = explode('_ru', $key);
                        $translate = SettingTranslation::
                        leftJoin('settings', 'settings.id', '=', 'setting_translations.setting_id')
                            ->select('settings.*')
                            ->where('setting_translations.name', $field_name[0])
                            ->where('setting_translations.locale', 'ru')
                            ->where('settings.section', 'header')
                            ->first();
                        if (!empty($translate) && !empty(Setting::find($translate->id))) {
                            Setting::find($translate->id)->update([
                                'ru' => ['val' => $val]
                            ]);
                        }
                    }
                }

            }

              //delete feature image
              $delete_feature_image  = $request->delete_feature_image;

              if($delete_feature_image!= NULL) {
                      $setting_feature_image = Setting::where('id',$delete_feature_image)->first();

                      if(!empty($setting_feature_image)){
                          $setting_feature_image->delete();
                      }
                      $feature_image = SettingTranslation::where('setting_id', $delete_feature_image)->first();
                      if(!empty($feature_image)){
                          $feature_image->delete();
                      }

                      $image_name = 'demo.png';
                      $image_path = public_path('frontend/image/'.$feature_image->val);
                      if(File::exists($image_path)) {
                      File::delete($image_path);
                      }

              }

            Cache::forget('settingData-en');
            Cache::forget('settingData-ar');
            Cache::forget('settingData-fr');
            Cache::forget('settingData-ru');

            Cache::forget('SettingTranslation-en');
            Cache::forget('SettingTranslation-ar');
            Cache::forget('SettingTranslation-fr');
            Cache::forget('SettingTranslation-ru');

            flash("<i class='fas fa-check'></i> New ".Str::singular($module_title).__('common.add_data'))->success()->important();
            return response()->json([
                'status' => 1,
                'message' => "<i class='fas fa-check'></i> New '" . Str::singular($module_title) . "' Added",
                'data' => [
                    'redirect' => url("admin/$module_name")
                ]
            ]);

        }
    }

}
