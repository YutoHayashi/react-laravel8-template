<?php

namespace App\Models;

use Spatie\Permission\PermissionRegistrar;

class Role extends \Spatie\Permission\Models\Role {

    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        'guard_name', 'created_at', 'updated_at',
    ];

    public function permissions(  ): \Illuminate\Database\Eloquent\Relations\BelongsToMany {
        return $this
            ->belongsToMany(
                config( 'permission.models.permission' ),
                config( 'permission.table_names.role_has_permissions' ),
                PermissionRegistrar::$pivotRole,
                PermissionRegistrar::$pivotPermission
            )
            ->take( 20 );
    }

    public function users(  ): \Illuminate\Database\Eloquent\Relations\BelongsToMany {
        return $this
            ->morphedByMany(
                getModelForGuard( $this->attributes[ 'guard_name' ] ),
                'model',
                config( 'permission.table_names.model_has_roles' ),
                PermissionRegistrar::$pivotRole,
                config( 'permission.column_names.model_morph_key' )
            )
            ->take( 20 );
    }

}
