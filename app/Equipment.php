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
        'user_id','type','economic', 'plates_us', 'plates_mx','state_us','state_mx', 'vin', 'trademark', 'model','estatus','start_date',
        'start_hour', 'end_date', 'end_hour','origin', 'origin_state', 'origin_country', 'complete_origin', 'destiny', 'destiny_state', 'destiny_country',
        'complete_destiny'
    ];

    //--------------Relations----------------//
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //----------------SCOPES--------------

    public function scopeavailable($query)
    {
        $today = date('Y-m-d');

        return $query->whereDate('end_date', '>=', $today);
    }

    public function scopetype($query, $type)
    {
        if($type){
            return $query->where('type','LIKE',"$type%");
        }
    }

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
            return 'Caja Refrigerada 53 pies';
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

    public function getGetEstatusAttribute()
    {

        $today = date('Y-m-d');
        $start = date($this->start_date);
        $end = date($this->end_date);

        if($today > $start && $today < $end){
            echo '<span class="badge badge-success">Activo</span>';
        }else{
            echo '<span class="badge  badge-danger">Inactivo</span>';
        }


        /*if ($this->estatus == 'active') {
            echo '<span class="badge badge-success">Activo</span>';
        }

        if ($this->estatus == 'inactive') {
            echo '<span class="badge  badge-danger">Inactivo</span>';
        }*/
    }
}
