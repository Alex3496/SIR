<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{

    protected $fillable = [
        'type_tariff','origin', 'destiny', 'max_weight','min_weight','type_weight', 'distance', 'type_equipment','rate',
        'user_id'
    ];
    

    //--------------Relations----------------//
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    //--------------ATRIBUTTES------------------
    
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
}
