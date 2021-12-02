<?php

namespace App\Traits;

trait ApiResponser {

    use ApiResponse\AuthTokenResponse,
        ApiResponse\UserResponse,
        ApiResponse\ProfileResponse,
        ApiResponse\PermissionResponse,
        ApiResponse\RoleResponse;

}
