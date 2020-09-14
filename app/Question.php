<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function listereponses(){
  		return $this->hasMany(Listereponse::class);
  	}
}
