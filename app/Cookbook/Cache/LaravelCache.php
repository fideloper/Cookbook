<?php namespace Cookbook\Cache;

// Laravel Cache facade
use Illuminate\Cache\CacheManager;

class LaravelCache implements CacheInterface {

    protected $cache;
    protected $cachekey;
    protected $minutes;

    public function __construct(CacheManager $cache, $cachekey, $minutes=null)
    {
        $this->cache = $cache;
        $this->cachekey = $cachekey;
        $this->minutes = $minutes;
    }

    public function get($key)
    {
        return $this->cache->section($this->cachekey)->get($key);
    }

    public function put($key, $value, $minutes=null)
    {
        if( is_null($minutes) )
        {
            $minutes = $this->minutes;
        }

        return $this->cache->section($this->cachekey)->put($key, $value, $minutes);
    }

    public function has($key)
    {
        return $this->cache->section($this->cachekey)->has($key);
    }

}