<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listereponse extends Model
{
  public function questions(){
		return $this->belongsTo(Question::class);
	}
}
