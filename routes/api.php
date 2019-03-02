<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Rutas de usuarios
Route::get('users/mostrarPokemon/{id}', 'ApiUserController@mostrarPokemon');
Route::resource('users','ApiUserController');

//Rutas de medallas
Route::get('medals/usersByMedals/{id}', 'ApiMedalController@users');
Route::resource('medals','ApiMedalController');

//Rutas de pokémons
Route::get('pokemons/mostrarEntrenador/{id}', 'ApiPokemonController@mostrarEntrenador');
Route::resource('pokemons', 'ApiPokemonController');