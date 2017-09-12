<?php

namespace App\Repositories\Traits;

/**
 * Forked from https://github.com/dannyweeks/laravel-base-repository
 * Unfortunately there was no working Laravel 5.5 version at the time of this project
 *
 * TODO: Clear cache if a record is updated. Maybe use updated_at as cache key.
 *
 * Trait CacheResults
 *
 * @package App\Repositories\Traits
 */
trait CacheResults
{
    /**
     * Array of predefined method that should cache.
     *
     * @var array
     */
    protected $baseCacheableMethods = [
        'getAll',
        'getPaginated',
        'getForSelect',
        'getById',
        'getItemByColumn',
        'getCollectionByColumn',
        'getActively',
    ];

    /**
     * Disable caching on the fly.
     *
     * @return $this
     */
    public function disableCaching()
    {
        $this->caching = false;

        return $this;
    }

    /**
     * Get ttl (minutes).
     *
     * @return int
     */
    protected function getCacheTtl()
    {
        return isset($this->cacheTtl) ? $this->cacheTtl : 60;
    }

    /**
     * @param $methodName
     * @return bool
     */
    protected function isCacheableMethod($methodName)
    {
        return in_array($methodName, $this->getCacheableMethods());
    }

    /**
     * Perform the query and cache if required.
     *
     * @param $callback
     * @param $method
     * @param $args
     * @return mixed
     */
    protected function processCacheRequest($callback, $method, $args)
    {
        $key = $this->createCacheKey($method, $args);

        return $this->getCache()->remember($key, $this->getCacheTtl(), $callback);
    }

    /**
     * Make a unique key for this specific request.
     *
     * @param $functionName string Name of method to call.
     * @param $args array Argument to pass into the method.
     * @return string
     */
    protected function createCacheKey($functionName, $args)
    {
        return sprintf('%s.%s.%s', get_class(), $functionName, md5(implode('|', $args)));
    }

    /**
     * returns Illuminate\Contracts\Cache\Repository
     */
    protected function getCache()
    {
        return app()->make('Illuminate\Contracts\Cache\Repository');
    }

    /**
     * @return array
     */
    protected function getCacheableMethods()
    {
        $methods = $this->baseCacheableMethods;

        // Include user defined methods.
        if (isset($this->cacheableMethods)) {
            $methods = array_merge($this->baseCacheableMethods, $this->cacheableMethods);
        }

        // Filter any unwanted methods.
        if (isset($this->nonCacheableMethods)) {
            $methods = array_filter($methods, function ($methodName) {
                return !in_array($methodName, $this->nonCacheableMethods);
            });
        }

        return $methods;
    }
}