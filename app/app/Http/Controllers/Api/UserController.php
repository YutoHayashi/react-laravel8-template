<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use \App\Models\User;
use \App\Http\Resources\Api\ResponseBody;
use \App\Http\Resources\Api\User\UserResource;
use \App\Http\Resources\Api\User\UserResourceCollection;

class UserController extends Controller {

    /**
     * Index user
     * @return JsonResponse  
     */
    public function index(  ) {
        try {
            return UserResourceCollection::create( User::take( 10 )->get(  ) );
        } catch( \Exception $e ) {
            return ResponseBody::create( [
                'code' => 400,
                'errors' => [ $e->getMessage(  ), ],
            ] );
        }
    }

    /**
     * Store user
     * @param \App\Http\Requests\Api\Auth\StoreRequest $request - Validated request object.
     * @return JsonResponse 
     */
    public function store( \App\Http\Requests\Api\User\StoreRequest $request ) {
        $payload = $request->validated(  );
        try {
            return UserResource::create( User::createBase( $payload ) );
        } catch ( \Exception $e ) {
            return ResponseBody::create( [
                'code' => 400,
                'errors' => [ $e->getMessage(  ), ],
            ] );
        }
    }

    /**
     * Update user
     * @param User $user - User object.
     * @param \App\Http\Requests\Api\Auth\UpdateRequest $request - Validated request object.
     * @return JsonResponse 
     */
    public function update( User $user, \App\Http\Requests\Api\User\UpdateRequest $request ) {
        $payload = $request->validated(  );
        try {
            $user->update( $payload );
            return UserResource::create( $user );
        } catch( \Exception $e ) {
            return ResponseBody::create( [
                'code' => 400,
                'errors' => [ $e->getMessage(  ), ],
            ] );
        }
    }

    /**
     * Destroy user.
     * @param User $user - User object.
     * @return JsonResponse 
     */
    public function destroy( User $user ) {
        try {
            $user->delete(  );
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
     * Retrieve user
     * @param User $user - User model
     * @return JsonResponse 
     */
    public function show( User $user ) {
        return UserResource::create( $user );
    }

    /**
     * Restore use data
     * @param User $user
     * @return JsonResponse 
     */
    public function restore( User $user ) {
        try {
            $user->restore(  );
            return UserResource::create( $user );
        } catch( \Exception $e ) {
            return ResponseBody::create( [
                'code' => 400,
                'errors' => [ $e->getMessage(  ), ],
            ] );
        }
    }

    /**
     * Verify user email
     * @param Request $request 
     * @return JsonResponse 
     */
    public function verify( Request $request ) {
        if (
            User::where( 'email_verification_token', $request->get( 'email_verification_token' ) )
                ->firstOrFail(  )
                ->update( [
                    'email_verified_at' => \Carbon\Carbon::now(  ),
                ] )
        ) {
            return ResponseBody::create( [  ] );
        } else {
            return ResponseBody::create( [
                'code' => 400,
            ] );
        }
    }

}
