<?php

namespace App\Http\Middleware;

use App\Pokemon;
use Closure;
use Illuminate\Support\Facades\Auth;

class eliminarPokes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Con $request->route()->parameter('id') recogemos el parámetro que hemos pasado por url

        $poke = Pokemon::find($request->route()->parameter('id'));
        //Si el id del usuario es igual al id del entrenador sigue a la ruta
        if(Auth::user()->id!=$poke->user_id){
            return redirect()->route('forbidden');
        }
      // echo $poke;
     //  die();
        return $next($request);
    }
}
