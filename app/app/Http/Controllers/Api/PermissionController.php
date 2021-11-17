<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use \App\Http\Resources\Api\ResponseBody;
use \App\Http\Resources\Api\Permission\PermissionResource;
use \App\Http\Resources\Api\Permission\PermissionResourceCollection;

class PermissionController extends Controller {

    /**
     * Index permission.
     * @return Response 
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
     * Store permission.
     * @param StoreRequest $request - Validated request object
     * @return Reponse 
     */
    public function store( \App\Http\Requests\Api\Permission\StoreRequest $request ) {
        $payload = $request->validated(  );
        try {
            $permission = Permission::create( $payload );
            return PermissionResource::create( $permission );
        } catch( \Exception $e ) {
            return ResponseBody::create( [
                'code' => 400,
                'errors' => [ $e->getMessage(  ), ],
            ] );
        }
    }

    /**
     * Update permission.
     * @param Permission $permission - Permission object
     * @param UpdateRequest $request - Validated request object
     * @return Response
     */
    public function update( Permission $permission, \App\Http\Requests\Api\Permission\UpdateRequest $reqeust ) {
        $payload = $request->validated(  );
        try {
            $permission->update( $payload );
            return PermissionResource::create( $permission );
        } catch( \Exception $e ) {
            return ResponseBody::create( [
                'code' => 400,
                'errors' => [ $e->getMessage(  ), ],
            ] );
        }
    }

    /**
     * Destroy permission.
     * @param Permission $permission - Permission object
     * @return Response 
     */
    public function destroy( Permission $permission ) {
        try {
            $permission->delete(  );
            return ResponseBody::create( [
                'code' => 200,
            ] );
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
     * @return Response 
     */
    public function show( Permission $permission ) {
        return PermissionResource::create( $permission );
    }

}
