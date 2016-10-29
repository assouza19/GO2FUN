<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $table = 'files';

    protected $fillable = [ 'file_name', 'file_disk', 'file_path', 'file_ext' ];

    protected $appends = [ 'url', 'thumbnail', 'medium' ];

    /**
     * Get all of the owning likeable models.
     */
    public function attach()
    {
        return $this->morphTo();
    }

    public function getUrlAttribute()
    {
        return url('images') . str_replace(['\\', 'app/uploads'], ['/', ''], $this->attributes['file_path']);
    }

    public function getThumbnailAttribute()
    {
        $image = str_replace( ".{$this->attributes['file_ext']}", "-thumbnail.{$this->attributes['file_ext']}", $this->attributes['file_path'] );
        return url('images') . str_replace(['\\', 'app/uploads'], ['/', ''], $image);
    }

    public function getMediumAttribute()
    {
        $image = str_replace( ".{$this->attributes['file_ext']}", "-medium.{$this->attributes['file_ext']}", $this->attributes['file_path'] );
        return url('images') . str_replace(['\\', 'app/uploads'], ['/', ''], $image);
    }
}
