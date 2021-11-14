<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\User;

class UserController extends Controller {

    public function create(  ) {
        return view( 'user.form' );
    }

    public function save( \App\Http\Requests\Web\Auth\SaveRequest $request ) {
        $payload = $request->validated(  );
        try {
            User::createAdmin( $payload );
            return redirect(  )->route( 'admin.create' );
        } catch( \Exception $e ) {
            return view( 'user.form', [
                'errors' => [ $e->getMessage(  ) ],
            ] );
        }
    }

}
