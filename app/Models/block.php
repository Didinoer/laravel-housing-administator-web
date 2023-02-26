<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class block extends Model
{
    use HasFactory;


    /**
     * Get all of the comments for the block
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function resident()
    {
        return $this->hasMany(resident::class ,'block_id', 'id' );
    }
}
