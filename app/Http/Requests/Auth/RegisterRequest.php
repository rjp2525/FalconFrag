<?php namespace Falcon\Http\Requests\Auth;

use Falcon\Http\Requests\Request;

class RegisterRequest extends Request
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
            'first_name' => 'required|max:255|alpha',
            'last_name' => 'required|max:255|alpha',
            'company' => 'max:255',
            'username' => 'required|max:20|alpha_dash|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:8',
            'terms_of_service' => 'accepted',
        ];
    }

}
