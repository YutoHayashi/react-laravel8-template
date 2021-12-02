<?php

namespace App\Http\Requests\Traits;

trait FailedValidation {

    use \App\Traits\ApiResponser;

    protected function failedValidation( \Illuminate\Contracts\Validation\Validator $validator ) {
        throw new \Illuminate\Http\Exceptions\HttpResponseException(
            $this->errorResponse( $validator->errors(  )->toArray(  ), 400 )
        );
    }

}
