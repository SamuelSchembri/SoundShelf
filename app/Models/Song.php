<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Song extends Model
{
    use HasFactory;
    protected $fillable = ['album_id', 'title', 'track_number', 'duration'];

    public function album(): BelongsTo // A Song belongs to one Album
    {
        return $this->belongsTo(Album::class);
    }
}
