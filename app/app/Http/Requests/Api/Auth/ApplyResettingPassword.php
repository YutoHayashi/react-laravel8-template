<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ApplyResettingPassword extends FormRequest {

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
            'token' => [
                'required', 'string',
            ],
            'password' => [
                'required', 'min:8', 'max:50',
            ],
        ];
    }

}
