<?php

namespace App\Http\Controllers;

use App\Medal;
use Illuminate\Http\Request;

class MedalController extends Controller
{
    //
    public function index(){

        return view('medal.index')->with('medallas', Medal::all());
    }
}
