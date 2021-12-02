<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler {

    use \App\Traits\ApiResponser;

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register(  ) {
        //
    }

    public function render( $request, \Throwable $e ) {
        return $this->_handleException( $request, $e );
    }

    private function _handleException( $request, \Throwable $e ) {
        if ( $e instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException ) {
            return $this->errorResponse( [ 'The specified method for the request is invalid.' ], 405 );
        }
        if ( $e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException ) {
            return $this->errorResponse( [ 'The specified URl cannot be found.', ], 404 );
        }
        if ( $e instanceof \Symfony\Component\HttpKernel\Exception\HttpException ) {
            return $this->errorResponse( [ $e->getMessage(  ), ], $e->getStatusCode(  ) );
        }
        if ( config( 'app.debug' ) ) {
            return parent::render( $request, $e );
        }
        return $this->errorResponse( [ 'Unexpected Exception. Try later', ], 500 );
    }

}
