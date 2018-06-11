<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalsOfOrder extends Model
{
	protected $table='detalsoforders';
	
	  protected $fillable = ['model_id', 'branch_id', 'quantity', 'order_id'];
	  public $timestamps = false;
	
    public function model_(){
		return $this->belongsTo('App\Model_');
	}
	
	public function order(){
		return $this->belongsTo('App\Order');
	}
	
	public function branch(){
		return $this->belongsTo('App\Branch');
	}
}
