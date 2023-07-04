<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Validator;

class ProfileRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'image' => 'nullable',
            'name' => 'nullable|min:3|max:40',
            'phone' => 'nullable|min:11|max:11',
//            'username' => 'nullable',
            'username' => [
                'nullable',
                'string',
                'min:5',             // must be at least 5 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[@]/',
                'unique:profiles',
                'regex:!/[-]/',
            ],
            'bio' => 'nullable'
        ];
    }

    public function failedValidation(Validator|\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new HttpResponseException(response()->json(
            [
                'success' => false,
                'message' => $validator->errors()
            ],
            422)
        );
    }
}
