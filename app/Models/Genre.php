<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function artists(): HasMany
    {
        return $this->hasMany(Artist::class);
    }

    public function albums(): HasMany
    {
        return $this->hasMany(Album::class);
    }

    public function tracks(): HasMany
    {
        return $this->hasMany(Track::class);
    }
}
