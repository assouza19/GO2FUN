<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SimpleXMLElement;

class Evento extends Model
{
    protected $table = 'eventos';
    protected $appends = 'distance';

    protected $fillable = [
        'nome', 'dataInicio', 'dataFim', 'periodo', 'idAnunciante', 'idCategoria', 'idSubCat',
        'descricao', 'idClassificacao', 'status', 'valor', 'logradouro', 'cep', 'bairro', 'cidade',
        'estado', 'views'
    ];

    public function getDistanceAttribute()
    {
        $origins = \Auth::user()->cep;
        $destinations = $this->attributes['cep'];
        $mode = 'CAR';
        $language = 'PT';
        $str = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/xml?origins={$origins}|&destinations={$destinations}|&mode={$mode}|&language={$language}|&sensor=false");
        return new SimpleXMLElement( $str );
    }
}
