<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'user_id',
        'name_insurance', 
        'contact_name',
        'general_liability_ins',
        'commercial_general_liability',
        'auto_liability',
        'motor_truck_cargo',
        'trailer_interchange',
        'another_insurance',
    ];

     /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'general_liability_ins' => 'boolean',
        'commercial_general_liability' => 'boolean',
        'auto_liability' => 'boolean',
        'motor_truck_cargo' => 'boolean',
        'trailer_interchange' => 'boolean'
    ];
    

    //--------------Relations----------------//
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
