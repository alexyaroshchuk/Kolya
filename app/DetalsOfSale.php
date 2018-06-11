<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalsOfSale extends Model
{
	protected $table='detalsofosales';
	 protected $fillable = ['model_id', 'quantity', 'sale_id'];
	  public $timestamps = false;
	
    public function sale(){
		return $this->belongsTo('App\Sale');
	}
	
	public function model_(){
		return $this->belongsTo('App\Model_');
	}
}
