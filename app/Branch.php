<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
	 protected $fillable = ['city', 'streat', 'housenumber'];
	
	protected $table='branches';
    public function staffs(){
		return $this->hasMany('App\Staff', 'branch_id', 'id');
	}
	
	 public function products(){
		return $this->hasMany('App\Product', 'branch_id', 'id');
	}
	
	 public function detalsoforders(){
		return $this->hasMany('App\DetalsOfOrder', 'branch_id', 'id');
	}
	
	public function detalsofpre_rders(){
		return $this->hasMany('App\DetalsOfPre_Order', 'branch_id', 'id');
	}
}
