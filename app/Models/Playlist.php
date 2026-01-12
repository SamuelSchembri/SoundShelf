<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Playlist extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'name', 'slug'];

    public function user(): BelongsTo // A Playlist belongs to one User
    {
        return $this->belongsTo(User::class);
    }

    public function songs(): BelongsToMany // A Playlist has many Songs (many-to-many relationship)
    {
        return $this->belongsToMany(Song::class, 'playlist_song');
    }
}
