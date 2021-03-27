<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stay extends Model
{
    protected $fillable = [
        'user_id','check_in','check_in_hours','check_in_minutes','free_hours', 'check_out','check_out_hours','check_out_minutes','type','cost_hour','company','unity','operator','client', 'direction','payment_operator','customer_charge'
    ];

    //--------------Relations----------------//
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }


    //--------------Atributos----------------//


    public function getGetTypeAttribute()
    {
        if ($this->type == 'load') {
            return 'Carga';
        }

        if ($this->type == 'download') {
            return 'Descarga';
        }
     
	}

}
