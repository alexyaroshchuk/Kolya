<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentOfWaybill extends Model
{  

    protected $fillable = ['waybill_id', 'model_id', 'quantity',];
    protected $table='contentofwaybills';
    public $timestamps = false;
    
    
    public function model_(){
		return $this->belongsTo('App\Model_');
	}
	
	public function waybill(){
		return $this->belongsTo('App\Waybill');
	}
}
