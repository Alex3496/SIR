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

    public function getGetPlatesUsAttribute()
    {   
        if($this->plates_us == null){
            return 'n/a';
        }
        return $this->plates_us;
    }

    public function getGetPlatesMxAttribute()
    {   
        if($this->plates_mx == null){
            return 'n/a';
        }
        return $this->plates_mx;
    }

    public function getGetStateUsAttribute()
    {   
        if($this->state_us == null){
            return 'n/a';
        }
        return CountryState::getStateName($this->state_us,'US');
    }

    public function getGetStateMxAttribute()
    {
        if($this->state_mx == null){
            return 'n/a';
        }
        return CountryState::getStateName($this->state_mx,'MX');
        
    }
}
