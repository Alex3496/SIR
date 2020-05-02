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
        'user_id','name_insurance', 'contact_name', 'contact_phone','contact_email'
    ];


    //--------------Relations----------------//
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
