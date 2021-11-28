<?php

namespace App\Models;

class Permission extends \Spatie\Permission\Models\Permission {

    protected $hidden = [
        'guard_name', 'created_at', 'updated_at',
    ];

}
