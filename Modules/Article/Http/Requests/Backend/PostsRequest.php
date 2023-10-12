<?php

namespace Modules\Article\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_en' => 'required|max:191',
            'name_ar' => 'required|max:191',
            'name_fr' => 'required|max:191',
            'name_ru' => 'required|max:191',

            'slug' => 'nullable|max:191',
            'intro_en' => 'required',
            'intro_ar' => 'required',
            'intro_fr' => 'required',
            'intro_ru' => 'required',

            'content_en' => 'required',
            'content_ar' => 'required',
            'content_fr' => 'required',
            'content_ru' => 'required',

            'type' => 'required|max:191',
            //'category_id' => 'required|numeric',
            'created_by_alias' => 'nullable|max:191',

            'featured_image_en' => 'required|mimes:jpeg,png,jpg,gif,webp',
            'featured_image_ar' => 'required|mimes:jpeg,png,jpg,gif,webp',
            'featured_image_fr' => 'required|mimes:jpeg,png,jpg,gif,webp',
            'featured_image_ru' => 'required|mimes:jpeg,png,jpg,gif,webp',

            'type' => 'required',
            'is_featured' => 'required',
            'order' => 'nullable|numeric',
            'status' => 'required|in:active,inactive',
        ];
    }
}
