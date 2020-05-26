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
}
