<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use AuthenticableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'role'
    ];

    protected $appends = [
        'is_confirmed'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne( Profile::class, 'user_id' );
    }

    public function avatar()
    {
        return $this->morphMany( Files::class, 'attach' );
    }

    public function confirmeds()
    {
        return $this->belongsToMany( Events::class, 'events_confirmeds', 'user_id', 'event_id' );
    }

    public function getIsConfirmedAttribute()
    {
        $events = $this->confirmeds;

        foreach( $events as $event )
        {
            $items[] = $event->id;
        }

        return (isset($items) ? $items : null);
    }

    public function getAvatarUrlAttribute()
    {
        if( isset( $this->avatar[0] ) ) {
            return [
                'full' => $this->avatar[0]->url,
                'thumbnail' => $this->avatar[0]->thumbnail
            ];
        } else {
            return null;
        }
    }

    public function getCategoriesAttribute()
    {
        if( isset($this->profile->fields) ) {
            return (isset($this->profile->fields->categories) ? $this->profile->fields->categories : null);
        } else {
            return null;
        }
    }
}
