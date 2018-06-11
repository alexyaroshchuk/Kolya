<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     protected $fillable = ['client_id'];
 
    public function client() {
		return $this->belongsTo('App\Client');
	}
	
	public function detalsoforders(){
		return $this->hasMany('App\DetalsOfOrder', 'order_id', 'id');
	}
}
