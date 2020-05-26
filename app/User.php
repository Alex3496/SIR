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
        'name', 'email', 'password', 'type_company_user', 'company_name', 'position', 'phone'
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

    //----------------RELATIONS--------------
    public function roles()
    {
        return $this->belongsToMany('App\Role','role_user');
    }

    public function tariffs()
    {
        return $this->hasMany(Tariff::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function dataset()
    {
        return $this->hasOne('App\company_dataset');
    }
    public function insurance()
    {
        return $this->hasOne('App\Insurance');
    }

    //----------------GATES--------------
    
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


    //----------------ATTRIBUTES--------------

    public function getGetImageAttribute()
    {
        if ($this->avatar) {
            return url('storage/' . $this->avatar);
        }
    }
    
}
