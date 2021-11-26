<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model {

    use HasFactory, SoftDeletes, \App\Models\Traits\UseUuidForPK;

    protected $table = 'profiles';

    protected $keyType = 'string';

    protected $fillable = [
        'user_id',
    ];

    protected $hidden = [];

    protected $casts = [];

    protected $dates = [];

    public static function create( User $user ) {
        return static::query(  )->create( [
            'user_id' => "$user",
        ] );
    }

}
