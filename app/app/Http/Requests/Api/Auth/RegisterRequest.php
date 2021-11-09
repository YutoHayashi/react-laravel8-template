<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(  )
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
            'name' => [ 'required', 'string', 'max:50', 'min:4', ],
            'email' => [ 'required', 'max:255', 'email', 'unique:users,email', ],
            'password' => [ 'required', 'string', 'min:8', 'max:50', ],
        ];
    }

    public function messages(  ) {
        return [
            'name.required' => '',
            'name.string' => '',
            'name.max' => '',
            'name.min' => '',
            'email.required' => '',
            'email.max' => '',
            'email.email' => '',
            'email.unique' => '',
            'password.required' => '',
            'password.string' => '',
            'password.min' => '',
            'password.max' => '',
        ];
    }

    protected function failedValidation( Validator $validator ) {
        throw new HttpResponseException(
            \App\Http\Resources\Api\ResponseBody::create( [
                'code' => 400,
                'errors' => $validator->errors(  )->toArray(  ),
            ] )
        );
    }
}
