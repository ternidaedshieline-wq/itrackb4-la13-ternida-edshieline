<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movie extends Model
{
    protected $fillable = ['title', 'director', 'year', 'genre_id'];
    // add 'featured' to the list if you have that column

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }
}