<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{

    protected $fillable = [
        'origin', 'destiny', 'date', 'weight', 'distance', 'type_equipment', 'user_id'
    ];

    //--------------Relations
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
