<?php

namespace App\Http\Controllers;

use App\Medal;
use App\Pokemon;
use App\User;
use Illuminate\Http\Request;

class PruebaController extends Controller
{
    //
    public function index(){
        /*    $user = new User();
            $user->name="ernesto";
            $user->apellido="apellido";
            $user->password= bcrypt("1234");
            $user->telefono=12345;
            $user->email="ernesto@gmail.com";
            $user->rol="admin";
            $user->imagen="";
            $user->save();

                 $medal = new Medal();
                 $medal->nombreMedalla="agua";
                 $medal->save();


                 $poke = new Pokemon();
                 $poke->user_id=1;
                 $poke->nombre="pikachu";
                 $poke->tipo="electrico";
                 $poke->save();*/


        $medal = Medal::find(1);
        $user = User::find(1);
    //    $user->medals()->attach($medal);
     //   $medal->users()->attach($user);
      //  return $user->medals()->where('user_id', $user->id)->first()->id;
      //  return $medal->users()->get();
    }
}
