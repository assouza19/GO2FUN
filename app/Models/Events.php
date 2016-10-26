<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = 'events';

    protected $fillable = [
        'name',
        'status',
        'value',
        'description',
        'address',
        'cep',
        'bairro',
        'city',
        'state'
    ];

    protected $dates = [ 'init_at', 'end_at' ];

    public function image()
    {
        return $this->morphMany( Image::class, 'attach' );
    }

    public function confirmeds()
    {
        return $this->belongsTo( User::class, 'event_id', 'user_id', 'events_confirmeds' );
    }

    public function getUrlAttribute()
    {
        return url('panel/events/details/' . $this->attributes['id']);
    }
}
