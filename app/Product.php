<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{	
	/*protected $fillable = ['user_id'];*/
    public $timestamps = false;
    
    public function model_() {
		return $this->belongsTo('App\Model_');
	}
	
	 public function branch() {
		return $this->belongsTo('App\Branch');
	}
}
