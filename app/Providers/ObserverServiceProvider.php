<?php
/**
 * User: Gamma-iron
 * Date: 07.02.2020
 */

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        foreach (config('settings.observers') as $entityClass => $observerClass) {
            $entityClass::observe($observerClass);
        }
    }
}
