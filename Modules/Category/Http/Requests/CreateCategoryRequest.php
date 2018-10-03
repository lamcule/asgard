<?php

namespace Modules\Category\Http\Requests;

// use Modules\Core\Internationalisation\BaseFormRequest;
use Dingo\Api\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'parent_id' => 'required|integer',
            'type' => 'required'
        ];
    }

    public function translationRules()
    {
        return [];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'name.required' => 'A name is required ',
            'name.max' => 'A name max length is 255 character',
            'parent_id.integer' => 'Parent id is a integer',
            'parent_id.required' => 'A parent_id is required!',
            'type.required' => 'A type is required!'
        ];
    }

    public function translationMessages()
    {
        return [];
    }
}
