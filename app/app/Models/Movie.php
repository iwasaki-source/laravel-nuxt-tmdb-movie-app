<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'overview',
        'poster_path',
        'tmdb_id',
        'release_date',
    ];

    // public function favorites()
    // {
    //     return $this->hasMany(Favorite::class);
    // }

    // public function reviews()
    // {
    //     return $this->hasMany(Review::class);
    // }
}
