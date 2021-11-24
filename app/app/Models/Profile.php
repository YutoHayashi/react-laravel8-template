<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

    use HasFactory, \App\Models\Traits\PrimaryUuid;

    protected $table = 'profiles';

    protected $keyType = 'string';

    protected $fillable = [];

    protected $hidden = [];

    protected $casts = [];

    protected $dates = [];

    public static function create( $attributes ) {
        return ( new static )->newQuery(  )->create( $attributes );
    }

}
