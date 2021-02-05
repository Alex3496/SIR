<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'user_id','name', 'last_name', 'license','visa','fast', 'unique_badge', 
        'r_control'
    ];
}
