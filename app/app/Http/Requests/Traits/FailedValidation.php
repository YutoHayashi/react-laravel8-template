<?php

namespace App\Http\Requests\Traits;

trait FailedValidation {

    protected function failedValidation( \Illuminate\Contracts\Validation\Validator $validator ) {
        throw new \Illuminate\Http\Exceptions\HttpResponseException(
            \App\Http\Resources\Api\ResponseBody::create( [
                'code' => 400,
                'errors' => $validator->errors(  )->toArray(  ),
            ] )
        );
    }

}
