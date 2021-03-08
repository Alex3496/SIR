<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use CountryState;

class Equipment extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    
    protected $fillable = [
        'user_id','type','economic', 'plates_us', 'plates_mx','state_us','state_mx', 'vin', 
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

    public function getGetTypeEquipmentAttribute()
    {
        if ($this->type == 'Dry Box 48 ft') {
            return 'Caja seca 48 pies';
        }

        if ($this->type == 'Dry Box 53 ft') {
            return 'Caja seca 53 pies';
        }

        if ($this->type == 'Refrigerated Box 53 ft') {
            return 'Caja Refigerada 53 pies';
        }

        if ($this->type == 'Plataform 48 ft') {
            return 'Plataforma 48 pies';
        }

        if ($this->type == 'Plataform 53 ft') {
            return 'Plataforma 53 pies';
        }

        if ($this->type == 'Container 20 ft') {
            return 'Contenedor 20 pies';
        }

        if ($this->type == 'Container 40 ft') {
            return 'Contenedor 40 pies';
        }

        if ($this->type == 'Container 40 ft High cube') {
            return 'Contenedor 40 pies High cube';
        }

        if ($this->type == 'Box') {
            return 'Caja';
        }

        if ($this->type == 'Package') {
            return 'Bulto';
        }

        if ($this->type == 'Pallet') {
            return 'Pallet';
        }

        return $this->type;
    }
}
