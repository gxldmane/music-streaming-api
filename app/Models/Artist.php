<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'genre_id',
        'bio'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function tracks(): HasMany
    {
        return $this->hasMany(Track::class);
    }

    public function albums(): HasMany
    {
        return $this->hasMany(Album::class);
    }

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }

    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'likable');
    }
}
