<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{ 
    protected $fillable = ['staff_id'];
     
    public function detalsofsales(){
		return $this->hasMany('App\DetalsOfSale', 'sale_id', 'id');
	}
	
	 public function staff() {
		return $this->belongsTo('App\Staff');
	}
}
