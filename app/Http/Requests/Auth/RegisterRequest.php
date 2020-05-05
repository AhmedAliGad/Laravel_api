<?php

namespace App\Http\Requests\Auth;



use App\Http\Requests\API\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|max:200|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'image' => 'required|image|max:2048'
        ];
    }
}
