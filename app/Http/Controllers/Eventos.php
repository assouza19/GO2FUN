<?php

namespace App\Http\Controllers;

use App\Evento;
use Illuminate\Http\Request;

use App\Http\Requests;

class Eventos extends Controller
{
    public function filters( Request $request, $type )
    {
        $fields = $request->all();

        $order = (isset( $fields['order'] ) ? $fields['order'] : 'DESC' );
        switch ( $type )
        {
            case 'preco':
                // url: user/home/filter/preco?order=asc
                $data = Evento::orderBy('valor', $order)
                    ->get();
                break;
            case 'categoria':
                // url: user/home/filter/categoria?order=asc&category=2
                $category = ( isset( $fields['category'] ) ? $fields['category'] : 1 );
                $data = Evento::where('idCategoria', $category)
                    ->orderBy('nome', $order)
                    ->get();
                break;
            case 'inicio':
                // url: user/home/filter/inicio?order=asc
                $data = Evento::orderBy('dataInicio', $order)->get();
                break;
            case 'classificacao':
                // url: user/home/filter/classificacao?order=asc&classification=1
                $classification = ( isset( $fields['classification'] ) ? $fields['classification'] : 1 );
                $data = Evento::where('idClassificacao', $classification)
                    ->orderBy('nome', $order)
                    ->get();
                break;
            case 'localizacao':
                // url: user/home/filter/localizacao?order=asc
                $data = Evento::orderBy( 'distance', $order )
                    ->get();
                break;
            default:
                // url: user/home
                $data = Evento::all();
                break;
        }

        return view('user.home', [
            'list' => $data
        ]);
    }
}
