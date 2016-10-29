<?php
/**
 * Created by PhpStorm.
 * User: raank
 * Date: 27/10/16
 * Time: 23:51
 */

namespace App\Helpers;


class Helpers
{
    /**
     * Seta o valor para a Moeda brasileira ( 3.000,00 )
     * @param $xValue
     * @param int $xDecimal
     * @return null|string
     */
    static public function real( $xValue = null, $xDecimal = 2 )
    {
        $xValue       = preg_replace( '/[^0-9]/', '', $xValue); // Deixa apenas números
        $xNewValue    = substr($xValue, 0, -$xDecimal); // Separando número para adição do ponto separador de decimais
        $xNewValue    = ($xDecimal > 0) ? $xNewValue.".".substr($xValue, strlen($xNewValue), strlen($xValue)) : $xValue;
        return (isset($xValue) && $xValue != '' ? number_format($xNewValue, $xDecimal, ',', '.') : null);
    }

    static public function getFields( $get = null )
    {
        if( \Auth::user()->role != 'ad' ) {
            $fields = [
                'birth' => 'Data de nascimento',
                'genre' => 'Genêro',
                'cpf' => 'CPF',
                'phone' => 'Telefone',
                'cep' => 'Cep',
                'address' => 'Endereço',
                'bairro' => 'Bairro',
                'city' => 'Cidade',
                'state' => 'Estado',
                'news' => 'News',
                'categories' => 'Categorias'
            ];
        } else {
            $fields  = [
                'razao' => '',
                'CNPJ' => '',
                'phone' => 'Telefone',
                'cep' => 'Cep',
                'address' => 'Endereço',
                'bairro' => 'Bairro',
                'city' => 'Cidade',
                'state' => 'Estado',
                'categories' => 'Categorias'
            ];
        }

        return (isset($get) ? $fields[ $get ] : $fields);
    }
}