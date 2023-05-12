<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Review extends Model
{
    use HasFactory;

    public function Books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class);
    }
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(user::class);
    }

    public static function getUserName($id)
    {
        $user = User::select('name')->where('id', $id)->first();
        return $user;
    }
}
