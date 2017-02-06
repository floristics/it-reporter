<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasRoles,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * @return bool
     */
    public function isSuperAdmin()
    {
        return $this->hasRole('SuperAdmin');
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return $this->hasRole('Admin');
    }

    /**
     * @return bool
     */
    public function isUser()
    {
        return $this->hasRole('User');
    }

    public function GetOrgId()
    {
        $OrgId = Organisation::where('user_id','=',$this->id)->first();
        if ( $OrgId ) {
            return $OrgId->id;
        }
        return false;
    }


}
