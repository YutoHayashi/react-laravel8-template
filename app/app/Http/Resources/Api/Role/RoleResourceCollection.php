<?php

namespace App\Http\Resources\Api\Role;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RoleResourceCollection extends ResourceCollection {

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray( $request ) {
        return $this->collection->map( function( $role ) {
            return new RoleResource( $role->resource );
        } );
    }

}
