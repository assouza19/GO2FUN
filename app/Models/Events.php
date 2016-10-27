<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SimpleXMLElement;

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

    protected $appends = [ 'url', 'distance' ];

    protected $dates = [ 'init_at', 'end_at' ];

    public function image()
    {
        return $this->morphMany( Files::class, 'attach' );
    }

    public function confirmeds()
    {
        return $this->belongsTo( User::class, 'event_id', 'user_id', 'events_confirmeds' );
    }

    public function getUrlAttribute()
    {
        return url('panel/events/details/' . $this->attributes['id']);
    }

    public function getDistanceAttribute()
    {
        $origins = \Auth::user()->profile->fields->cep;
        $destinations = $this->attributes['cep'];
        $mode = 'CAR';
        $language = 'PT';
        $str = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/xml?origins={$origins}|&destinations={$destinations}|&mode={$mode}|&language={$language}|&sensor=false");
        $distance = new SimpleXMLElement( $str );
        return (isset($distance->status) ? (string) $distance->row->element->distance->text : null);

//        return $distance;
    }
}
