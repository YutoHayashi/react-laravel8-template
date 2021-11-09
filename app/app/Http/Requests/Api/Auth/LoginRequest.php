<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
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
    public function rules(  )
    {
        return [
            'email' => [ 'required', 'max:255', 'email', ],
            'password' => [ 'required', 'string', 'min:8', 'max:50', ],
        ];
    }

    public function messages(  ) {
        return [
            'email.required' => '',
            'email.max' => '',
            'email.email' => '',
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
