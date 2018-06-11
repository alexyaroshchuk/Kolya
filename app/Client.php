<?php

namespace App;
use Order;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{   
 
    protected $fillable = ['user_id'];
    public $timestamps = false;
    public function orders(){
		return $this->hasMany('App\Order', 'client_id', 'id');
	}
	
	  public function user(){
		return $this->belongsTo('App\User');
	}
}
