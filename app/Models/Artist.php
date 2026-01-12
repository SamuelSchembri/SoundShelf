<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Artist extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug'];

    public function albums(): HasMany // An Artist has many Albums
    {
        return $this->hasMany(Album::class);
    }
}
