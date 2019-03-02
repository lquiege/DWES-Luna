<?php

namespace App\Http\Controllers;

use App\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    //
    public function index(){
        return view('pokemon.index')->with('pokemons', Pokemon::all());
    }


    public function insertar(){

        return view('pokemon.insertar');
    }

    public function insertarConfirmed(Request $request){

        $validatedData = $request->validate([
            'userId' => 'required|int',
            'nombre' => 'required|string|max:20',
            'tipo' => 'required|string|max:20',

        ]);

        $pokemon = new Pokemon();
        $pokemon->user_id = $request->input('userId');
        $pokemon->nombre = $request->input('nombre');
        $pokemon->tipo = $request->input('tipo');
        $pokemon->save();

        return redirect()->action('PokemonController@index');
    }

    public function editar($id){
        return view('pokemon.editar')->with('pokemon', Pokemon::find($id));
    }

    public function editarConfirmed(Request $request, $id){

        $validatedData = $request->validate([
            'userId' => 'required|int',
            'nombre' => 'required|string|max:20',
            'tipo' => 'required|string|max:20',

        ]);
        $pokemon = Pokemon::find($id);
        $pokemon->user_id = $request->input('userId');
        $pokemon->nombre = $request->input('nombre');
        $pokemon->tipo = $request->input('tipo');
        $pokemon->save();

        return redirect()->action('PokemonController@index');

    }

    public function eliminar($id){
        $poke = Pokemon::find($id);
        $poke->delete();
        return redirect()->action('PokemonController@index');
    }
}
