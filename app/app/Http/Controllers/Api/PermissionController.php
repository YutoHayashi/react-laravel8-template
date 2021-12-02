<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController as Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use \App\Models\Permission;

class PermissionController extends Controller {

    /**
     * Index permission.
     * @return JsonResponse 
     */
    public function index(  ) {
        try {
            return $this->permissionsResponse( Permission::take( 10 )->get(  ) );
        } catch( \Throwable $e ) {
            return $this->errorResponse( [ $e->getMessage(  ), ], 400 );
        }
    }

    /**
     * Retrieve permission
     * @param Permission $permission - Permission model
     * @return JsonResponse 
     */
    public function show( Permission $permission ) {
        return $this->permissionResponse( $permission );
    }

    /**
     * Create permission routes.
     * @return JsonResponse
     */
    public function store(  ) {
        \Illuminate\Support\Facades\Artisan::call( 'permission:create-permission-routes' );
        return $this->successResponse(  );
    }

}
