<?php
/**
 * Created by PhpStorm.
 * User: raank
 * Date: 28/10/16
 * Time: 01:06
 */

namespace App\Helpers;


class Events
{
    static public function getClass( $get = null )
    {
        $array = [
            1 => 'SOZINHO',
            2 => 'COM AMIGOS',
            3 => 'COM FAMILIA',
            4 => 'COM PARCEIRO(A)',
            5 => 'COM FILHO(S)'
        ];
        return (isset($get) ? $array[$get] : $array);
    }

    static public function getPeriod( $get = null )
    {
        $array = [
            'M' => 'Manhã',
            'T' => 'Tarde',
            'N' => 'Noite'
        ];
        return (isset($get) ? $array[$get] : $array);
    }

    static public function userConfirmed( $event )
    {
        $user = \Auth::user()->is_confirmed;
        return (in_array($event, $user) ? true : false);
    }
}