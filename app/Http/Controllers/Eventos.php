<?php

namespace App\Http\Controllers;

use App\Evento;
use Illuminate\Http\Request;

use App\Http\Requests;

class Eventos extends Controller
{
    public function filters( Request $request, $type )
    {
        $eventos = Evento::all();
        return view('user.home', ['eventos', $eventos]);
    }
}
