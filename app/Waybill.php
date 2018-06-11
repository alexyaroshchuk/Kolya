<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waybill extends Model
{  
    protected $fillable = ['staff_id', 'provider_id'];
    
    public function contentofwaybills(){
		return $this->hasMany('App\ContentOfWaybill', 'waybill_id', 'id');
	}
	
	 public function staff() {
		return $this->belongsTo('App\Staff');
	}
	
	 public function provider() {
		return $this->belongsTo('App\Provider');
	}
}
