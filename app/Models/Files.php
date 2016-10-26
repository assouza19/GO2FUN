<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $table = 'files';

    /**
     * Get all of the owning likeable models.
     */
    public function attach()
    {
        return $this->morphTo();
    }
}
