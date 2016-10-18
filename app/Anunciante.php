<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Anunciante extends Authenticatable
{
    use Notifiable;
    protected $redirectTo = 'anunciante/home';
    protected $table = 'anunciantes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nomeFantasia', 'razaoSocial','email', 'password', 'cnpj', 'telefone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
