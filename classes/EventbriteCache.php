<?php


namespace Samhoud\Eventbrite\Classes;


use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class EventbriteCache
{
    const CACHE_MINUTES = 10;

    public function get($key){

        if (Cache::has($key)) {
            return Cache::get($key);
        }
        return false;
    }

    public function put($key, $data, $cacheMinutes = null){
        if(!$cacheMinutes)
            $cacheMinutes = self::CACHE_MINUTES;

        $expiresAt = Carbon::now()->addMinutes($cacheMinutes);
        Cache::put($key, $data, $expiresAt);
    }

    public function flush(){
        Cache::flush();
    }
}