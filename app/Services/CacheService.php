<?php

namespace App\Services;

use Closure;
use Illuminate\Contracts\Cache\Repository as Cache;

class CacheService
{
    /**
     * Time to live in seconds.
     *
     * @var int
     */
    protected $ttl = 60 * 60 * 24 * 7;

    /**
     * The mapping key.
     *
     * @var string
     */
    protected $mappingKey = 'cache.keys';

    /**
     * Create new CacheService instance.
     *
     * @param  Cache  $cache
     * @return void
     */
    public function __construct(
        protected Cache $cache
    ) {
      //
    }

    /**
     * Get an item from the cache, or execute the given Closure and store the result.
     *
     * @param  array  $classes
     * @param  string  $key
     * @param  Closure  $closure
     * @return mixed
     */
    public function remember(array $classes, $key, Closure $closure)
    {
        $data = $this->cache->remember($key, $this->ttl(), $closure);

        $this->rememberClassesKeyMappings($classes, $key);

        return $data;
    }

    /**
     * Forget all keys associated with the given class name.
     *
     * @param  string  $class  The class for which all caches should be forgotten
     * @param  string  $needle Optional keyword to match only specific cache keys
     * @return void
     */
    public function forget($class, string $needle = null)
    {
        $keys = $this->cache->get($this->mappingKey, [])[$class] ?? [];

        foreach ($keys as $key) {
            if (! $needle || str_contains($key, $needle)) {
                $this->cache->forget($key);
            }
        }
    }

    /**
     * Remember classes key mappings.
     *
     * @param  array  $classes
     * @param  string  $key
     * @return void
     */
    protected function rememberClassesKeyMappings(array $classes, $key)
    {
        $mappings = $this->cache->get($this->mappingKey, []);

        foreach ($classes as $class) {
            if (! array_key_exists($class, $mappings)) {
                $mappings[$class] = [];
            }

            if (! in_array($key, $mappings[$class])) {
                $mappings[$class][] = $key;
            }
        }

        $this->cache->forever($this->mappingKey, $mappings);
    }

    /**
     * Get the time to live in seconds.
     *
     * @return int
     */
    protected function ttl()
    {
        return $this->ttl;
    }
}
