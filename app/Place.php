<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function staffs(){
		return $this->hasMany('App\Staff', 'place_id', 'id');
	}
}
