<?php

namespace App\Traits\ApiResponse;

use \App\Models\User;
use \App\Http\Resources\Api\User\UserResource;
use \App\Http\Resources\Api\User\UserResourceCollection;

trait UserResponse {

    use \App\Traits\ApiResponse\ApiResponse;

    protected function userResponse( User $user ) {
        return $this->successResponse( new UserResource( $user ) );
    }

    protected function usersResponse( \Illuminate\Database\Eloquent\Collection $users ) {
        return $this->successResponse( new UserResourceCollection( $users ) );
    }

}
