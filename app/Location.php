<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
       'city', 'state', 'country','state_code','country_code','status','location_complete' 
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

    /*
     *   @param $status type array
     */
    public function scopestatus($query, $status)
    {
        if($status){
            return $query->whereIn('status',$status);
        }
    }
    /*
     *  @function scopecomplete
     *  @param $location_complete type string : Tijuana, Baja California, Mexico
     *  
     *  Esta funcion recibe la ubicacion completa para traer todos los datos que se requiere de esta,
     *  
     */
    public function scopecomplete($query, $location_complete)
    {
        if($location_complete){
            return $query->where('location_complete',$location_complete);
        }
    }
}
