<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements JWTSubject {

    use HasFactory, Notifiable, HasRoles;

    /**
     * The database table used by the model.
     * 
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_root',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at', 'email_verified_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT
     */
    public function getJWTIdentifier(  ) {
        return $this->getKey(  );
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT
     */
    public function getJWTCustomClaims(  ) {
        return [  ];
    }

    public function setPasswordAttribute( $unhashed ) {
        $this->attributes[ 'password' ] = \Illuminate\Support\Facades\Hash::make( $unhashed );
    }

    /**
     * Override create method
     */
    public static function create( $attributes ) {
        $user = ( new static )->newQuery(  )->create( $attributes );
        $user->notify( new \App\Notifications\UserRegistered );
        return $user;
    }

    /**
     * Create admin user.
     */
    public static function createRoot( $payload ) {
        return User::create(
            $payload + [
                'is_root' => true,
            ]
        );
    }

}
