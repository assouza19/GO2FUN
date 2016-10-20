<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
  protected $fillable = [
      'nome', 'dataInicio', 'dataFim', 'periodo', 'idAnunciante', 'idCategoria', 'idSubCat',
      'descricao', 'idClassificacao', 'status', 'valor', 'logradouro', 'cep', 'bairro', 'cidade',
      'estado', 'views'
  ];
}
