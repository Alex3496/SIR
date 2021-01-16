<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use CountryState;

class Tariff extends Model
{

    protected $fillable = [
        'user_id', 'type_tariff','origin', 'origin_country','origin_state','destiny','destiny_country','destiny_state', 
        'approx_weight','type_weight','distance', 'type_equipment','rate','currency','height','width','length' ,'complete_origin', 'complete_destiny'
    ];
    

    //--------------Relations----------------//
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function userfav()
    {
        return $this->belongsToMany(User::class);
    }

    //--------------SCOPES----------------//

    /*
    *
    * Metodo que busca las tarifas en el que el destino y origen sean el mismo que el origen que el usuario
    * introdujo para que aparezca el vieje de "regreso"
    *
    */
    public function scopeorigin($query, $origin)
    {
        if($origin){
            return $query->where('origin','LIKE',"$origin%")
                        ->orWhere('destiny','LIKE',"$origin%");
        }
    }
     /*
    *
    * Metodo que busca las tarifas en el que el destino y origen sean el mismo que el destino que el usuario
    * introdujo para que aparezca el viaje de "regreso"
    *
    */
    public function scopedestiny($query, $destiny)
    {
        if($destiny){
            return $query->where('destiny','LIKE',"$destiny%")
                        ->orWhere('origin','LIKE',"$destiny%");

        }
    }

    public function scopeequipment($query, $type_equipment)
    {
        if($type_equipment){
            if($type_equipment == 'Any'){
                return $query;
            }else{
                return $query->where('type_equipment','LIKE',"$type_equipment%");
            }
        }
    }

    public function scopetruckTariffs($query, $id)
    {
        if($id){
            return $query->where('user_id',$id)
            ->where('type_tariff','TRUCK');
        }
    }

    public function scopetrainTariffs($query, $id)
    {
        if($id){
            return $query->where('user_id',$id)
            ->where('type_tariff','TRAIN');
        }
    }

    public function scopemaritimeTariffs($query, $id)
    {
        if($id){
            return $query->where('user_id',$id)
            ->where('type_tariff','MARITIME');
        }
    }

    public function scopeaerialTariffs($query, $id)
    {
        if($id){
            return $query->where('user_id',$id)
            ->where('type_tariff','AERIAL');
        }
    }

    /*
    *
    * Metodo que busca las tarifas con el Origen que tenga alguna coincidencia con los buscado por el Admin
    * Sirve para buscar por medio del campo 'complete_origin'
    */
    public function scopecompleteOrigin($query, $complete_origin)
    {
        if($complete_origin){
            return $query->where('complete_origin','LIKE',"%$complete_origin%");
        }
    }

    /*
    *
    * Metodo que busca las tarifas con el Destino que tenga alguna coincidencia con los buscado por el Admin
    * Sirve para buscar por medio del campo 'complete_destiny'
    */
    public function scopecompleteDestiny($query, $complete_destiny)
    {
        if($complete_destiny){
            return $query->where('complete_destiny','LIKE',"%$complete_destiny%");
        }
    }

    //--------------ATRIBUTTES------------------

    /*
    * Traduce el tipo de equipo qeu tiene la tarifa
    */
    public function getGetTypeTariffAttribute()
    {
        if ($this->type_tariff == 'TRUCK') {
        	return 'Camión';
        }

        if ($this->type_tariff == 'TRAIN') {
        	return 'Tren';
        }

        if ($this->type_tariff == 'MARITIME') {
        	return 'Maritimo';
        }

        if ($this->type_tariff == 'AERIAL') {
        	return 'Aéreo';
        }
    }

    public function getGetTypeEquipmentAttribute()
    {
        if ($this->type_equipment == 'Dry Box 48 ft') {
            return 'Caja seca 48 pies';
        }

        if ($this->type_equipment == 'Dry Box 53 ft') {
            return 'Caja seca 53 pies';
        }

        if ($this->type_equipment == 'Refrigerated Box 53 ft') {
            return 'Caja Refigerada 53 pies';
        }

        if ($this->type_equipment == 'Plataform 48 ft') {
            return 'Plataforma 48 pies';
        }

        if ($this->type_equipment == 'Plataform 53 ft') {
            return 'Plataforma 53 pies';
        }

        if ($this->type_equipment == 'Container 20 ft') {
            return 'Contenedor 20 pies';
        }

        if ($this->type_equipment == 'Container 40 ft') {
            return 'Contenedor 40 pies';
        }

        if ($this->type_equipment == 'Container 40 ft High cube') {
            return 'Contenedor 40 pies High cube';
        }

        if ($this->type_equipment == 'Box') {
            return 'Caja';
        }

        if ($this->type_equipment == 'Package') {
            return 'Bulto';
        }

        if ($this->type_equipment == 'Pallet') {
            return 'Pallet';
        }
    }

    public function getGetStateOriginAttribute()
    {
        return CountryState::getStateName($this->origin_state,$this->origin_country);
    }

    public function getGetCountryOriginAttribute()
    {
        return CountryState::getCountryName($this->origin_country);
    }

    public function getGetStateDestinyAttribute()
    {
        return CountryState::getStateName($this->destiny_state,$this->destiny_country);
    }

    public function getGetCountryDestinyAttribute()
    {
        return CountryState::getCountryName($this->destiny_country);
    }

    /*
    * Retorna la ciadad de origen completa (desuso)
    */
    public function getGetOriginAttribute()
    {
        $city = $this->origin;
        $state = CountryState::getStateName($this->origin_state,$this->origin_country);
        $country = CountryState::getCountryName($this->origin_country);

        return "$city, $state, $country";
    }

    /*
    * Retorna la ciadad de destino completa (desuso)
    */
    public function getGetDestinyAttribute()
    {
        $city = $this->destiny;
        $state = CountryState::getStateName($this->destiny_state,$this->destiny_country);
        $country = CountryState::getCountryName($this->destiny_country);

        return "$city, $state, $country";
    }
}
