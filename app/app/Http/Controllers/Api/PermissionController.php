<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use \App\Models\Permission;
use \App\Http\Resources\Api\ResponseBody;
use \App\Http\Resources\Api\Permission\PermissionResource;
use \App\Http\Resources\Api\Permission\PermissionResourceCollection;

class PermissionController extends Controller {

    /**
     * Index permission.
     * @return JsonResponse 
     */
    public function index(  ) {
        try {
            return PermissionResourceCollection::create( Permission::take( 10 )->get(  ) );
        } catch( \Exception $e ) {
            return ResponseBody::create( [
                'code' => 400,
                'errors' => [ $e->getMessage(  ), ],
            ] );
        }
    }

    /**
     * Retrieve permission
     * @param Permission $permission - Permission model
     * @return JsonResponse 
     */
    public function show( Permission $permission ) {
        return PermissionResource::create( $permission );
    }

    /**
     * Create permission routes.
     * @return JsonResponse
     */
    public function store(  ) {
        \Illuminate\Support\Facades\Artisan::call( 'permission:create-permission-routes' );
        return ResponseBody::create( [  ] );
    }

}
