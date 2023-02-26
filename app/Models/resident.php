<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resident extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'house number', 'phone number', 'block_id'];
    /**
     * Get the user that owns the resident
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function block()
    {
        return $this->belongsTo(block::class, 'block_id', 'id');
    }
}
