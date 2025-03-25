<?php

namespace App\Models;

use Database\Factories\ScreeningFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screening extends Model
{
    /** @use HasFactory<ScreeningFactory> */
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'screening_time',
        'available_seats',
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
