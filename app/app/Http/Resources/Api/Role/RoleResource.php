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
        return [
            'role' => parent::toArray( $request ),
        ];
    }

    public static function create( \Spatie\Permission\Models\Role $role ) {
        return \App\Http\Resources\Api\ResponseBody::create( [
            '_embedded' => new RoleResource( $role ),
        ] );
    }

}
