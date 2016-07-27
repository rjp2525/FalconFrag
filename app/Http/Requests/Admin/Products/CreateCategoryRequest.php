<?php

namespace Falcon\Http\Requests\Admin\Products;

use Falcon\Http\Requests\Request;

class CreateCategoryRequest extends Request
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
            'title'         => 'required',
            'description'   => 'max:255',
            'display_order' => 'integer'
        ];
    }

    /**
     * Set custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title'         => 'A category title is required.',
            'description'   => 'The category description must be less than 255 characters.',
            'parent'        => 'Please select a valid parent category.',
            'hidden'        => 'Please ensure the hidden field is a boolean type.',
            'display_order' => 'The display order must be an integer.'
        ];
    }
}
