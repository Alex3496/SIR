<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'name', 'email', 'password','phone', 'company_name', 'type_company_user'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function roles()
    {
        return $this->belongsToMany('App\Role','role_user');
    }


    //Check if user have any of the roles that we pass by parameter (array)
    public function hasAnyRoles($roles)
    {
        if($this->roles()->whereIn('name',$roles)->first())
        {
            return true;
        }

        return false;
    }

    //Check if user have a specific role
    public function hasRole($role)
    {
        if($this->roles()->where('name',$role)->first())
        {
            return true;
        }

        return false;
    }
    
}
