<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * fillable
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * hidden
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Set password attribute
     */
    public function setPasswordAttribute($value)
    {
        if ($value && is_string($value) && trim($value)) {
            $this->attributes['password'] = \Hash::make(trim($value));
        }
    }
}
