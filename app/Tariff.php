<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{

    protected $fillable = [
        'type_tariff','origin', 'destiny', 'date', 'max_weight','min_weight','type_weight', 'distance', 'type_equipment','rate','collection_Address', 
        'user_id'
    ];

    //--------------Relations----------------//
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
