<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'views',
        'uploaded_at',
    ];

    protected $casts = [
        'uploaded_at' => 'datetime',
    ];

    public function scopeSearchByTitle(Builder $query, $term): void
    {
        $query->when($term, fn($query, $term) => $query->where('title', 'like', "%{$term}%"));
    }

    public function scopeSearchByDateRange(Builder $query, Carbon $fromDate, Carbon $toDate): void
    {
        $query->whereDate('uploaded_at', '>=', $fromDate)
            ->whereDate('uploaded_at', '<=', $toDate);
    }
}
