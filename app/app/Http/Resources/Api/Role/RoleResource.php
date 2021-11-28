<?php

namespace App\Http\Resources\Api\Role;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource {

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray( $request ) {
        return array_merge( parent::toArray( $request ), [
            'permissions' => new \App\Http\Resources\Api\Permission\PermissionResourceCollection( $this->resource->permissions ),
            'users' => new \App\Http\Resources\Api\User\UserResourceCollection( $this->resource->users ),
        ] );
    }

    public static function create( \App\Models\Role $role ) {
        return \App\Http\Resources\Api\ResponseBody::create( [
            '_embedded' => [
                'role' => new RoleResource( $role ),
            ],
        ] );
    }

}
