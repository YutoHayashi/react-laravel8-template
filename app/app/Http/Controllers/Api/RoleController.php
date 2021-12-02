<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController as Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use \App\Models\Role;

class RoleController extends Controller {

    /**
     * Role index
     * @return JsonResponse 
     */
    public function index(  ) {
        try {
            return $this->rolesResponse( Role::take( 10 )->get(  ) );
        } catch( \Throwable $e ) {
            return $this->errorResponse( [ $e->getMessage(  ), ], 400 );
        }
    }

    /**
     * Store role.
     * @param \App\Http\Requests\Api\Role\StoreRequest $request - Validated request object.
     * @return JsonResponse 
     */
    public function store( \App\Http\Requests\Api\Role\StoreRequest $request ) {
        $payload = $request->validated(  );
        try {
            $role = Role::create( $payload );
            $role->syncPermissions( $request->get( 'permission' ) );
            return $this->roleResponse( $role );
        } catch( \Throwable $e ) {
            return $this->errorResponse( [ $e->getMessage(  ), ], 400 );
        }
    }

    /**
     * Update role.
     * @param Role $role - Role object
     * @param \App\Http\Requests\Api\Role\UpdateRequest $request - Validated request object.
     * @return JsonResponse 
     */
    public function update( \App\Http\Requests\Api\Role\UpdateRequest $request, Role $role ) {
        $payload = $request->validated(  );
        try {
            $role->update( $payload );
            $role->syncPermissions( $request->get( 'permissions' ) );
            return $this->roleResponse( $role );
        } catch( \Throwable $e ) {
            return $this->errorResponse( [ $e->getMessage(  ), ], 400 );
        }
    }

    /**
     * Destroy role.
     * @param Role $role - Role object.
     * @return JsonResponse  
     */
    public function destroy( Role $role ) {
        try {
            $role->delete(  );
            return $this->successResponse(  );
        } catch( \Throwable $e ) {
            return $this->errorResponse( [ $e->getMessage(  ), ], 400 );
        }
    }

    /**
     * Retrieve role
     * @param Role $role - Role model
     * @return JsonResponse 
     */
    public function show( Role $role ) {
        return $this->roleResponse( $role );
    }

}
