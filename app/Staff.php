<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
	 protected $fillable = ['city', 'streat', 'housenumber', 'firstname', 'lastname', 'salary', 'phonenumber', 'databirth', 'sex', 'place_id', 'branch_id'];
	
	protected $table='staffs';
	 public function sales(){
		return $this->hasMany('App\Sale', 'staff_id', 'id');
	}
	
	 public function waybills(){
		return $this->hasMany('App\Waybill', 'staff_id', 'id');
	}
	
    public function user(){
		return $this->belongsTo('App\User');
	}
	
	 public function branch(){
		return $this->belongsTo('App\Branch');
	}
	
	public function place(){
		return $this->belongsTo('App\Place');
	}
}
