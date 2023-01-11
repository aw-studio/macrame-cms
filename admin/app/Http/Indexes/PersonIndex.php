<?php

namespace Admin\Http\Indexes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Macrame\Index\Index;

class PersonIndex extends Index
{
    /**
     * Default number of items per page.
     *
     * @var int
     */
    protected $defaultPerPage = 9;

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
                ->where('name', 'LIKE', "%{$search}%")
                ->orWhere('phone', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%");
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
            $query->orderBy($key, $direction);
        }
    }
}
