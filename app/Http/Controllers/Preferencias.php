<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests;
use DB, Auth;

class Preferencias extends Controller
{
    use Notifiable;

    use RegistersUsers;
    protected $redirectTo = '/home';

    //

    public function checarPreferencias($id){
      $preferencias = DB::table('eventos')
          ->join('categorias', 'eventos.idCategoria', '=', 'categorias.idCategoria')
          ->join('preferencias', 'preferencias.idCategoria', '=', 'eventos.idCategoria')
          ->join('classificacao', 'eventos.idClassificacao', '=', 'classificacao.idClassificacao')
          ->where('preferencias.idusuario','=',$id)
          ->select('eventos.*', 'categorias.descricao', 'classificacao.descricao_classif')
          ->get();
      redirect(url('/home'));
    }

    public function usuarios(){
      return $this->belongsToMany('App\UserController');
    }
}
