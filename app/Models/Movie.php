<?php

namespace App\Models;

use Database\Factories\MovieFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    /** @use HasFactory<MovieFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'rating',
        'language',
        'poster_url',
    ];

    public function screenings()
    {
        return $this->hasMany(Screening::class);
    }
}
