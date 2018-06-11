<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalsOfPre_Order extends Model
{
	
	public function pre_order(){
		return $this->belongsTo('App\Pre_Order');
	}
	
    public function branch(){
		return $this->belongsTo('App\Branch');
	}
	
	 public function model_(){
		return $this->belongsTo('App\Model_');
	}
}
