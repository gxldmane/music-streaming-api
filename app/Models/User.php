<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function playlists(): HasMany
    {
        return $this->hasMany(Playlist::class, 'created_by');
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }


    public function likes(): HasMany
    {
        return $this->hasMany(Like::class, 'user_id');
    }


    public function trackLikes()
    {
        return $this->likes()->where('likable_type', 'App\Models\Track');
    }

    public function albumLikes()
    {
        return $this->likes()->where('likable_type', 'album');
    }

    public function playlistLikes()
    {
        return $this->likes()->where('likable_type', 'playlist');
    }

    public function artistLikes()
    {
        return $this->likes()->where('likable_type', 'artist');
    }
}
