<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company_dataset extends Model
{

	 protected $fillable = [
        'user_id','dba_name','scac_code','caat','mc_number','num_trucks','certificate_ctpat','certificate_oae','fast','warehouse','fiscal_warehouse',
        'position'
    ];
    

    //--------------Relations----------------//
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
