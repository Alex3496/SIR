<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Notifications\{VerifyEmailNotification,ResetPasswordNotification};

class User extends Authenticatable implements MustVerifyEmail 
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'name', 'email', 'password','phone','position', 'type_company_user', 
        'company_name', 'company_address', 'city', 'state','zip_code', 'country'
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

    //----------------RELATIONS--------------------
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    //user can create/owns many tariffs
    public function tariffs()
    {
        return $this->hasMany(Tariff::class);
    }

     //user can create/owns many tariffs
    public function petitions()
    {
        return $this->hasMany(Petition::class);
    }

    //user can save many tariffs in his "favorite list"
    public function tariffsFav()
    {
        return $this->belongsToMany(Tariff::class);
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

     //un Usuario puede estar a cargo de muchos operadores
    public function operators()
    {
        return $this->hasMany(Operator::class);
    }

    //un Usuario puede tener muchos equipos (cajas, etc)
    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }

     //un Usuario puede tener muchos vehiculos (cajas, etc)
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
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
        }else{
            return url('images/logos/avatar.jpg');
        }
    }

    //----------------SCOPES--------------

    public function scopename($query, $name)
    {
        if($name){
            return $query->where('name','LIKE',"%$name%");
        }
    }

    public function scopecompany($query,$company)
    {
        if($company){
            return $query->where('company_name','LIKE',"%$company%");
        }
    }
    public function scopeemail($query, $email)
    {
        if($email){
            return $query->where('email','LIKE',"%$email%");
        }
    }

    //----------------NOTIFICATIONS----------------

     /**
     * Send the email verification notification. Copy to model user to override the method
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmailNotification);
    }

    /**
     * Send the password reset notification. Copy to model user to override the method
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
    
}
