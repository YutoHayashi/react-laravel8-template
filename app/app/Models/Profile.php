<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model {

    use HasFactory,
        SoftDeletes,
        \App\Models\Traits\Stringable;

    protected $table = 'profiles';

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id', 'name',
    ];

    protected $hidden = [
        'user_id', 'deleted_at', 'created_at', 'updated_at',
    ];

    protected $visible = [
        'id', 'name',
    ];

    protected $casts = [  ];

    protected $dates = [  ];

    public static function create( User $user ) {
        return static::query(  )->create( [
            'user_id' => "$user",
        ] );
    }

}
