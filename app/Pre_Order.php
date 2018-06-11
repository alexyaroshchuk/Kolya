<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pre_Order extends Model
{
     public function client() {
		return $this->belongsTo('App\Client');
	}
	
	public function detalsofpre_orders(){
		return $this->hasMany('App\DetalsOfPre_Order', 'pre_order_id', 'id');
	}
}
