<?php

namespace App\Http\Requests\Api\Role;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest {

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
            'name' => [
                'unique:roles,name',
            ],
        ];
    }

}
