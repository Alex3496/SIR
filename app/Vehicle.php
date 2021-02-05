<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CountryState;

class Vehicle extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'user_id','economic', 'plates_us', 'plates_mx','state_us','state_mx', 'vin', 
    ];

    //--------------ATRIBUTTES------------------

    public function getGetStateUsAttribute()
    {
        return CountryState::getStateName($this->state_us,'US');
    }

    public function getGetStateMxAttribute()
    {
         return CountryState::getStateName($this->state_mx,'MX');
    }
}
