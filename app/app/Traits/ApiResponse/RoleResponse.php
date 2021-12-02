<?php

namespace App\Traits\ApiResponse;

use \App\Models\Role;
use \App\Http\Resources\Api\Role\RoleResource;
use \App\Http\Resources\Api\Role\RoleResourceCollection;

trait RoleResponse {

    use \App\Traits\ApiResponse\ApiResponse;

    protected function roleResponse( Role $role ) {
        return $this->successResponse( new RoleResource( $role ) );
    }

    protected function rolesResponse( \Illuminate\Database\Eloquent\Collection $roles ) {
        return $this->successResponse( new RoleResourceCollection( $roles ) );
    }

}
