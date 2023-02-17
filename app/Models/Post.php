<?php

namespace App\Models;

use App\Casts\PostAttributesCast;
use App\Casts\ContentCast;
use App\Models\Traits\HasFiles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    use HasFiles;

    /**
     * Attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'attributes',
        'content',
        'author_id',
        'publish_at',
        'unpublish_at',
        'feature_until',
        'is_pinned',
    ];

    /*
     * Attributes casts.
     *
     * @var array
     */
    protected $casts = [
        'attributes' => PostAttributesCast::class,
        'content' => ContentCast::class,
        'publish_at' => 'datetime',
        'unpublish_at' => 'datetime',
        'feature_until' => 'datetime',
        'is_pinned' => 'bool',
    ];

    /**
     * Default attribute values.
     */
    protected $attributes = [
        'content' => '[]',
        'attributes' => '[]',
    ];

    /**
     * An Post belongs to a user.
     *
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublished($query)
    {
        $query->where('publish_at', '<=', now())
            ->where(function ($query) {
                $query->where('unpublish_at', '>=', now())
                    ->orWhereNull('unpublish_at');
            });
    }

    public function scopeFeatured($query)
    {
        return $query->whereDate('feature_until', '>=', now())
            ->published();
    }

    public function scopeSearch($query, string $term)
    {
        return $query->published()->where('attributes', 'LIKE', "%{$term}%");
    }

    /**
     * Retrieve the model for a bound value but without
     * the global defaultAnnounceements scope.
     *
     * @param  mixed  $value
     * @param  string|null  $field
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value, $field = null)
    {
        if (! $field) {
            $field = 'id';
        }

        return $this
            ->where($field, $value)->firstOrFail();
    }

    public function getFullSlug()
    {
        return route('post.show', [
            'post' => $this->slug,
        ]);
    }
}
