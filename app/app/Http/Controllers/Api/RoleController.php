<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;
use \App\Http\Resources\Api\ResponseBody;
use \App\Http\Resources\Api\Role\RoleResource;
use \App\Http\Resources\Api\Role\RoleResourceCollection;

class RoleController extends Controller {

    /**
     * Role index
     * @return Response 
     */
    public function index(  ) {
        try {
            return RoleResourceCollection::create( Role::take( 10 )->get(  ) );
        } catch( \Exception $e ) {
            return ResponseBody::create( [
                'code' => 400,
                'errors' => [ $e->getMessage(  ) ],
            ] );
        }
    }

    /**
     * Store role.
     * @param StoreRequest $request - Validated request object.
     * @return Reponse 
     */
    public function store( \App\Http\Requests\Api\Role\StoreRequest $request ) {
        $payload = $request->validated(  );
        try {
            $role = Role::create( $payload );
            $role->syncPermissions( $request->get( 'permission' ) );
            return RoleResource::create( $role );
        } catch( \Exception $e ) {
            return ResponseBody::create( [
                'code' => 400,
                'errors' => [ $e->getMessage(  ), ],
            ] );
        }
    }

    /**
     * Update role.
     * @param Role $role - Role object
     * @param UpdateRequest $request - Validated request object.
     * @return Response 
     */
    public function update( Role $role, \App\Http\Requests\Api\Role\UpdateRequest $reqeust ) {
        $payload = $request->validated(  );
        try {
            $role->update( $payload );
            $role->syncPermissions( $request->get( 'permission' ) );
            return RoleResource::create( $role );
        } catch( \Exception $e ) {
            return ResponseBody::create( [
                'code' => 400,
                'errors' => [ $e->getMessage(  ), ],
            ] );
        }
    }

    /**
     * Destroy role.
     * @param Role $role - Role object.
     * @return Response  
     */
    public function destroy( Role $role ) {
        try {
            $role->delete(  );
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

}
