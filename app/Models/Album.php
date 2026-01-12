<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Album extends Model 
{
    use HasFactory;
    protected $fillable = ['artist_id', 'title', 'slug', 'year', 'genre', 'cover_url']; // Fillable attributes

    // An Album belongs to one Artist 
    public function artist(): BelongsTo
    {
        return $this->belongsTo(Artist::class); 
    }

    // An Album has many Songs 
    public function songs(): HasMany
    {
        return $this->hasMany(Song::class); 
    }
}
