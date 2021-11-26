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

    use HasFactory, Notifiable, HasRoles, SoftDeletes, \App\Models\Traits\CascadeSoftDelete;

    /**
     * The database table used by the model.
     * 
     * @var string
     */
    protected $table = 'users';

    protected $keyType = 'string';

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
        'password', 'remember_token', 'created_at', 'updated_at', 'email_verified_at', 'email_verification_token', 'deleted_at',
    ];

    protected $visible = [
        'id', 'name', 'email', 'is_root', 'profile',
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

    protected $cascadeDeletes = [
        'profile',
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
     * Get the value indicatin whether the IDs are incrementing.
     * @return bool
     */
    public function getIncrementing(  ) {
        return false;
    }

    protected static function boot(  ) {
        parent::boot(  );
        static::creating( function ( $user ) {
            $user->{ $user->getKeyName(  ) } = \Illuminate\Support\Str::uuid(  )->toString(  );
            $user->email_verification_token = \Illuminate\Support\Str::uuid(  )->toString(  );
        } );
    }

    /**
     * Override create method
     */
    public static function create( $attributes ) {
        $user = ( new static )->newQuery(  )->create( $attributes );
        Profile::create( $user );
        $user->notify( new \App\Notifications\UserRegistered );
        return $user;
    }

    /**
     * Create root user.
     */
    public static function createSuper( $attributes ) {
        return ( new static )->newQuery(  )->create(
            $attributes + [
                'is_root' => true,
            ]
        );
    }

    public function profile(  ) {
        return $this->belongsTo( Profile::class );
    }

    public function __toString(  ) {
        return $this->id;
    }

}
