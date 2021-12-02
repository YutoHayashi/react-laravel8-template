<?php

namespace App\Traits\ApiResponse;

use \App\Models\Permission;
use \App\Http\Resources\Api\Permission\PermissionResource;
use \App\Http\Resources\Api\Permission\PermissionResourceCollection;

trait PermissionResponse {

    use \App\Traits\ApiResponse\ApiResponse;

    protected function permissionResponse( Permission $permission ) {
        return $this->successResponse( new PermissionResource( $permission ) );
    }

    protected function permissionsResponse( \Illuminate\Database\Eloquent\Collection $permissions ) {
        return $this->successResponse( new PermissionResourceCollection( $permissions ) );
    }

}
