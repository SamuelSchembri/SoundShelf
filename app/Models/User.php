<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [ // Fillable attributes for mass assignment
        'name',
        'email',
        'password',
    ];


    protected $hidden = [ // Hidden attributes for arrays
        'password',
        'remember_token',
    ];


    protected $casts = [ // Attribute casting for specific data types
        'password' => 'hashed',
    ];

    public function playlists(): HasMany // A User has many Playlists
    {
        return $this->hasMany(\App\Models\Playlist::class);
    }
}
