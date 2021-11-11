<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(  ) {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(  ) {
        return [
            'name' => [ 'string', 'max:50', 'min:4', ],
            'email' => [ 'email', 'unique:users,email,'.$this->id, 'max:255', ],
        ];
    }

    public function messages(  ) {
        return [
            'name.string' => '',
            'name.max' => '',
            'name.min' => '',
            'email.email' => '',
            'email.unique' => '',
            'email.max' => '',
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
