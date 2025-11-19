<?php

namespace App\Providers;

use App\Entity\Blog\Category;
use App\Entity\Blog\Page;
use App\Entity\Blog\Post;
use App\Entity\Blog\Tag;
use App\Entity\Organization\Bank;
use App\Entity\Organization\Mfo;
use App\Entity\Product\CreditCard;
use App\Entity\Product\CreditCash;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    protected $bindModels = [
        'mfo'      => Mfo::class,
        'category' => Category::class,
        'tag'      => Tag::class,
        'bank' => Bank::class,
        'creditCard' => CreditCard::class,
        'creditCash' => CreditCash::class,

    ];

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        /*
         *  We remove duplicate pages, the server will give an error 404 or Not Found
         *  Checking the URL for the content / public / or / public / index.php
         */
        if (preg_match("/^\/public/", \Request::getBaseUrl()) ) {
            abort(404);
        }

        foreach ($this->bindModels as $key => $modelClass){
            Route::model($key, $modelClass);
        }

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware(['web', 'debugbar'])
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
