<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\User;
use \App\Http\Resources\Api\ResponseBody;
use \App\Http\Resources\Api\UserResource;

class UserController extends Controller {

    /**
     * 
     */
    public function index( Request $request ) {
        //
    }

    /**
     * 
     */
    public function store( \App\Http\Requests\Api\Auth\RegisterRequest $request ) {
        $payload = $request->validated(  );
        try {
            return UserResource::create( User::create( $payload ) );
        } catch ( \Exception $e ) {
            return ResponseBody::create( [
                'code' => 400,
                'errors' => [ $e->getMessage(  ), ],
            ] );
        }
    }

    /**
     * 
     */
    public function update( \App\Http\Requests\Api\Auth\UpdateRequest $payload ) {
        $payload = $request->validated(  );
    }

}
