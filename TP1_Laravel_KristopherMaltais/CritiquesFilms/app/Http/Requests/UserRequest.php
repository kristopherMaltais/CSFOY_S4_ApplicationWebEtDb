<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class UserRequest extends FormRequest
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
            'email' => 'required|string|max:50',
            'password' => 'required|string|min:4|max:255',
            'first_name' => 'required|string|min:1|max:50',
            'last_name' => 'required|string|min:1|max:50',
            'role_id' => 'required|gte:1|lte:2',
            'login' => 'required|string|min:1|max:50'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        abort(422,'Validation issue');
    }
}
