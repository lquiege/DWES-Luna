<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pruebas', 'PruebaController@index');
Route::get('/404', function () {
    return view('errors.404');
})->name('404');
Route::fallback(function(){
    return redirect()->route('404');
});
//Todas las rutas que necesitan hacer login se agrupan aquí
Route::group(['middleware'=> 'auth'], function () {

    //Rutas entrenador
    Route::get('/entrenadores', 'UsersControllers@index');
    Route::get('/entrenadores/{id}', ['middleware' => 'roles', 'uses' => 'UsersControllers@editar']);
    Route::put('/entrenadores/{id}', ['middleware' => 'roles', 'uses' => 'UsersControllers@editarConfirmed']);
    //Se aplica además otro middleware
    Route::get('/entrenadores/eliminar/{id}', ['middleware' => 'roles', 'uses' => 'UsersControllers@eliminar']);

    //Ruta medalla
    Route::get('medallas', 'MedalController@index');

    //Rutas Pokémon
    Route::get('pokemons', 'PokemonController@index');
    Route::get('pokemons/nuevo', 'PokemonController@insertar');
    Route::post('pokemons/nuevo', 'PokemonController@insertarConfirmed');
    //Se aplica además otro middleware
    Route::get('pokemons/eliminar/{id}', ['middleware' => 'eliminarPokes', 'uses' => 'PokemonController@eliminar']);
    Route::get('pokemons/{id}', 'PokemonController@editar');
    Route::put('pokemons/{id}', 'PokemonController@editarConfirmed');

    //Rutas tabla pivote
    Route::get('userMedal/nuevo', ['middleware' => 'roles', 'uses' => 'UsersControllers@nuevaMedalla']);
    Route::post('userMedal/nuevo', ['middleware' => 'roles', 'uses' => 'UsersControllers@nuevaMedallaConfirmed']);


    Route::get('403', function (){
        return view('auth.forbidden');
    })->name('forbidden');
});

//Rutas de autenticación
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
