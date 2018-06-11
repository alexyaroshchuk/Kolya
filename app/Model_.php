<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_ extends Model
{
	protected $table='models';
	
    public function type(){
		return $this->belongsTo('App\Type');
	}
	
	public function brand(){
		return $this->belongsTo('App\Brand');
	}
	
	
	 public function products(){
		return $this->hasMany('App\Product', 'model_id', 'id');
	}
	
	public function detalsoforders(){
		return $this->hasMany('App\DetalsOfOrder', 'model_id', 'id');
	}
	
	public function detalsofpre_orders(){
		return $this->hasMany('App\DetalsOfPre_Order', 'model_id', 'id');
	}
	
	public function detalsofsales(){
		return $this->hasMany('App\DetalsOfSale', 'model_id', 'id');
	}
	
	public function detalsofwaybills(){
		return $this->hasMany('App\DetalsOfWaybill', 'model_id', 'id');
	}
}
