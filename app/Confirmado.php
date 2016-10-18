<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confirmado extends Model
{
    protected $table = 'confirmados';
    //
      public function getConfirmados(){
        $id = Auth::user()->id;
        $eventos =  Confirmado::where('id_usuario','=',$id)->get();
        return $eventos;
      }
}
