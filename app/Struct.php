<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Struct extends Model
{
    public function prices (){
		return $this->hasMany("App\Price");
	}
}
