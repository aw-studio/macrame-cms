<?php

namespace Admin\Http\Indexes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Macrame\Index\Index;

class AnnouncementIndex extends Index
{
    /**
     * Default number of items per page.
     *
     * @var int
     */
    protected $defaultPerPage = 9;

    /**
     * The sortable keys.
     *
     * @var array
     */
    protected $sortableKeys = ['id', 'title', 'publish_at'];

    /**
     * Handle search.
     *
     * @param  Builder  $query
     * @param  string  $search
     * @return void
     */
    public function search(Builder $query, $search)
    {
        $query->where(function (Builder $query) use ($search) {
            $query
                ->where('attributes', 'LIKE', "%{$search}%");
        });
    }

    /**
     * Apply filter to the query.
     *
     * @param  Builder  $query
     * @param  Collection  $filters
     * @return void
     */
    public function filter(Builder $query, Collection $filters)
    {
        if ($filters->has('default')) {
            foreach ($filters['default'] as $filter) {
                $query->where($filter, true);
            }
        }
        if ($filters->has('featured')) {
            $query->featured();
        }
    }

    /**
     * Apply orders to the query.
     *
     * @param  Builder  $query
     * @param  Collection  $sort
     * @return void
     */
    public function sort(Builder $query, Collection $sort)
    {
        foreach ($sort as $key => $direction) {
            if (! in_array($key, $this->sortableKeys)) {
                return;
            }

            match ($key) {
                'title' => $query->orderBy('attributes->title', $direction),
                default => $query->orderBy($key, $direction),
            };
        }
    }
}
