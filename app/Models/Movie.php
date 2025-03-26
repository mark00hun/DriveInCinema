<?php

namespace App\Models;

use Database\Factories\MovieFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int         $id
 * @property string      $title
 * @property string      $description
 * @property string      rating
 * @property string      $language
 * @property string|null $poster_url
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
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

    public function screenings(): HasMany
    {
        return $this->hasMany(Screening::class);
    }
}
