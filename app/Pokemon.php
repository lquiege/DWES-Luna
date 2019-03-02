<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    //
    protected $table="pokemons";

    public function user(){
        return $this->belongsTo(User::class);
    }
}
