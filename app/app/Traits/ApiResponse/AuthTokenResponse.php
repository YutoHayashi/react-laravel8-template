<?php

namespace App\Traits\ApiResponse;

use \App\Http\Resources\Api\Auth\TokenResource;

trait AuthTokenResponse {

    use \App\Traits\ApiResponse\ApiResponse;

    protected function authTokenResponse( string $token ) {
        return $this->successResponse( new TokenResource( [
            'token' => $token,
        ] ) );
    }

}
