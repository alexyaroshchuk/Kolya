<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    public function waybills(){
		return $this->hasMany('App\Waybill', 'provider_id', 'id');
	}
}
