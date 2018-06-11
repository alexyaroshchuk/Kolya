<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function models_(){
		return $this->hasMany('App\Model_', 'model_id', 'id');
	}
}
