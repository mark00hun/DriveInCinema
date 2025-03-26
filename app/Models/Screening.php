<?php

namespace App\Models;

use Database\Factories\ScreeningFactory;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int         $id
 * @property int         $movie_id
 * @property DateTime    $screening_time
 * @property int         $available_seats
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Screening extends Model
{
    /** @use HasFactory<ScreeningFactory> */
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'screening_time',
        'available_seats',
    ];

    protected function casts()
    {
        return [
            'screening_time' => 'datetime',
        ];
    }

    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }
}
