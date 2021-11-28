<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model {

    protected $fillable = [
        'user_id',
    ];

    public static function boot(  ) {
        parent::boot(  );
        static::creating( function( $model ) {
            $model->token = \Illuminate\Support\Str::uuid(  )->toString(  );
        } );
    }

    public static function create( User $user ) {
        return static::query(  )->create( [
            'uesr_id' => "$user",
        ] );
    }

}
