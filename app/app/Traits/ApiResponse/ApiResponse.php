<?php

namespace App\Traits\ApiResponse;

use \App\Http\Resources\Api\ResponseBody;

trait ApiResponse {

    protected function errorResponse( Array $messages, int $code = 500 ) {
        return ( new ResponseBody( [
            'errors' => $messages,
            'code' => $code,
        ] ) )
            ->response(  )
            ->setStatusCode( $code );
    }

    protected function successResponse( $_embedded = [  ] ) {
        return ( new ResponseBody( [
            '_embedded' => $_embedded,
        ] ) )
            ->response(  )
            ->setStatusCode( 200 );
    }

}
