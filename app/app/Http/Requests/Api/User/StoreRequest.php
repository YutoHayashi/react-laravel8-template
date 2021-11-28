<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest {

    use \App\Http\Requests\Traits\FailedValidation;

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
            'email' => [
                'required', 'max:255', 'email', \Illuminate\Validation\Rule::unique( 'users', 'email' )->whereNull( 'deleted_at' ),
            ],
            'password' => [
                'required', 'string', 'min:8', 'max:50',
            ],
        ];
    }

}
