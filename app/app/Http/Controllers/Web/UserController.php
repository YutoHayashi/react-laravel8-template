<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\User;

class UserController extends Controller {

    public function create( Request $request ) {
        return view( 'user.form' );
    }

    public function save( \App\Http\Requests\Web\Auth\SaveRequest $request ) {
        $payload = $request->validated(  );
        try {
            return view( 'user.form', [
                'user' => User::createAdmin( $payload ),
            ] );
        } catch( \Exception $e ) {
            return view( 'user.form', [
                'errors' => [ $e->getMessage(  ) ],
            ] );
        }
    }

}
