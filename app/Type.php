<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function models_(){
		return $this->hasMany('App\Model_', 'type_id', 'id');
	}
}
