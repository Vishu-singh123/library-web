<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function gener()
    {
        return $this->belongsTo(Gener::class, 'geners_id');
    }

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
