<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
       'city', 'state', 'country','state_code','country_code','status', 
    ];

    //----------------SCOPES--------------

    public function scopecity($query, $city)
    {
        if($city){
            return $query->where('city','LIKE',"%$city%");
        }
    }

    public function scopestate($query,$state)
    {
        if($state){
            return $query->where('state','LIKE',"%$state%");
        }
    }

    public function scopecountry($query, $country)
    {
        if($country){
            return $query->where('country','LIKE',"%$country%");
        }
    }

    public function scopestatus($query, $status)
    {
        if($status){
        	$query->whereIn('status',$status);
        	
            return $query;
        }
    }
}
