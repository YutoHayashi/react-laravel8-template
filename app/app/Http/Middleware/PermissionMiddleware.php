<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Exceptions\UnauthorizedException;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle( Request $request, Closure $next, $permission = null )
    {
        if ( auth(  )->guest(  ) ) {
            throw UnauthorizedException::notLoggedIn(  );
        }
        if ( !is_null( $permission ) ) {
            $permissions = is_array( $permission ) ? $permission : explode( '|', $permission );
        } else {
            $permission = $request->route(  )->getName(  );
            $permissions = array( $permission );
        }
        foreach( $permissions as $p ) {
            if ( auth(  )->user(  )->can( $permission ) ) {
                return $next( $request );
            }
        }
        throw UnauthorizedException::forPermissions( $permissions );
    }
}
