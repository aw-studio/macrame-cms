<?php

namespace App\Models;

use App\Models\Traits\HasFiles;
use App\Casts\EventAttributesCast;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory, HasFiles;

    /**
     * Attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'starts_at',
        'ends_at',
        'attributes',
    ];

    /**
     * Attributes casts.
     *
     * @var array
     */
    protected $casts = [
        'attributes' => EventAttributesCast::class,
        'starts_at'  => 'datetime',
        'ends_at'    => 'datetime',
    ];

    public function scopeSearch(Builder $query, string $term)
    {
        return $query->where('attributes', 'LIKE', "%{$term}%");
    }

    public function getFullSlug()
    {
        return route('event.show', [
            'event' => $this->slug,
        ]);
    }
}
