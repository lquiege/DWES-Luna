<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  /*  protected $fillable = [
        'name', 'email', 'password',
    ];*/

    protected $fillable=['name', 'apellido', 'telefono', 'email', 'password', 'rol', 'imagen'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pokemons(){
        return $this->hasMany(Pokemon::class);
    }

    public function medals(){
        return $this->belongsToMany(Medal::class);
    }
}
