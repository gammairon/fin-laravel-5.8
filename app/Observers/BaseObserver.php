<?php
/**
 * User: Gamma-iron
 * Date: 07.02.2020
 */

namespace App\Observers;


use Illuminate\Support\Facades\Cache;

abstract class BaseObserver
{
    protected function clearCache($tags)
    {
        $tags = is_array($tags) ? $tags:[$tags];

        Cache::tags($tags)->flush();
    }
}
