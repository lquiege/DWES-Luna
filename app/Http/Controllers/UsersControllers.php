<?php

namespace App\Http\Controllers;

use App\Medal;
use App\User;
use Illuminate\Http\Request;

class UsersControllers extends Controller
{
    //
    public function index(){
        $entrenadores = User::all();
        return view('entrenadores.index')->with('entrenadores', $entrenadores);
    }
    //Formulario edición usuario
    public function editar($id){
        return view('entrenadores.edit')->with('entrenador', User::find($id));
    }
    //Eominar usuario
    public function eliminar($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->action('UsersControllers@index');
    }
    //Edición confirmada de entrenador
    public function editarConfirmed(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:10',
         /*   'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',*/
            'rol' => 'required',
            'imagen' => 'required',
        ]);

        //Guardamos la imagen en la carpeta images con su extensión original
        $profileImage = $request->file('imagen');
        $profileImageSaveAsName = time() .$id . "-profile." .
            $profileImage->getClientOriginalExtension();

        $upload_path = 'images/';
        $profile_image_url = $upload_path . $profileImageSaveAsName;
        $success = $profileImage->move($upload_path, $profileImageSaveAsName);

        $entrenador = User::find($id);
        $entrenador->name = $request->input('name');
        $entrenador->apellido = $request->input('apellido');
        $entrenador->telefono = $request->input('telefono');
        $entrenador->password = $entrenador->password;
        $entrenador->email = $entrenador->email;
        $entrenador->rol = $request->input('rol');
        $entrenador->imagen = $success;
       // $entrenador->imagen = $entrenador->imagen;

        $entrenador->save();
        return redirect()->action('UsersControllers@index');
    }
    //Formulario para añadir en la tabla pivote
    public function nuevaMedalla(){
        $entrenadores = User::all();
        $medallas = Medal::all();
        return view('entrenadores.nuevaMedalla', ['entrenadores' => $entrenadores, 'medallas' => $medallas]);
    }
    //Adición en la tabla pivote
    public function nuevaMedallaConfirmed(Request $request){

        $validatedData = $request->validate([
            'userId' => 'required',
            'medalId' => 'required',

        ]);

        $entrenador = User::find($request->input('userId'));
        $medal = Medal::find($request->input('medalId'));

        $entrenador->medals()->attach($medal);
        return redirect()->action('UsersControllers@index');
    }
}
