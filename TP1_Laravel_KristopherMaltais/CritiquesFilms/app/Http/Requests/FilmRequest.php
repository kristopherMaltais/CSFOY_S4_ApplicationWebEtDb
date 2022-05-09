<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;


class FilmRequest extends FormRequest
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
            'title' => 'required|string|min:|max:255',
            'language_id' => 'required|gte:1|lte:6',
            'length' => 'gt:0',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        abort(422,'Validation issue');
    }
}
