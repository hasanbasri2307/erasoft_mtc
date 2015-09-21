<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LoginFormRequest extends Request
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
            //
            'email' => 'required|email|max:10',
            'password'=>'required|max:5'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email Harus diisi vrooh',
            'email.max' => 'Email Ga bole panjang2 vrohhh',
            'password.max' => 'password kepanjangan vrohh'
        ];
    }
}
