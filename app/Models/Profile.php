<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';

    protected $jsonable = [ 'fields' ];

    public function getFieldsAttribute()
    {
        return json_decode( $this->attributes['fields'] );
    }
}
