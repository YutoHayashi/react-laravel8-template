<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements JWTSubject {

    use HasFactory,
        Notifiable,
        HasRoles,
        SoftDeletes,
        \App\Models\Traits\Stringable;

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
        'name', 'email', 'password', 'is_root', 'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email_verified_at', 'email_verification_token', 'created_at', 'updated_at', 'deleted_at',
    ];

    protected $visible = [
        'id', 'name', 'email', 'is_root',
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
     * The attributes that should be mutated to dates.
     */
    protected $dates = [
        'deleted_at',
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

    public static function boot(  ) {
        parent::boot(  );
        static::creating( function( $user ) {
            $user->email_verification_token = \Illuminate\Support\Str::uuid(  )->toString(  );
        } );
    }

    /**
     * Create super user.
     */
    public static function createSuper( Array $attributes ) {
        return static::query(  )->create(
            $attributes + [
                'is_root' => true,
            ]
        );
    }

    /**
     * Create base user.
     */
    public static function createBase( Array $attributes ) {
        return static::query(  )->create( $attributes );
    }

    public function profile(  ) {
        return $this->hasOne( Profile::class );
    }

}
