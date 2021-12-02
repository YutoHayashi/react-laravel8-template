<?php

namespace App\Traits\ApiResponse;

use \App\Models\Profile;
use \App\Http\Resources\Api\Profile\ProfileResource;

trait ProfileResponse {

    use \App\Traits\ApiResponse\ApiResponse;

    protected function profileResponse( Profile $profile ) {
        return $this->successResponse( new ProfileResource( $profile ) );
    }

}
