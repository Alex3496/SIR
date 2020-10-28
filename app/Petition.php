<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petition extends Model
{
    protected $fillable = [
        'user_id','origin', 'origin_country','origin_state','destiny','destiny_country','destiny_state', 
        'approx_weight','type_weight', 'type_equipment','rate','currency',
    ];

     //--------------Relations----------------//
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }


    //--------------ATRIBUTTES------------------

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
