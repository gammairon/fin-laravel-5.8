<?php

namespace App\Providers;

use App\Http\ViewComposers\LastNewsComposer;
use App\Http\ViewComposers\NavigationComposer;
use App\Http\ViewComposers\SidebarBankComposer;
use App\Http\ViewComposers\SidebarCreditCardComposer;
use App\Http\ViewComposers\SidebarCreditCashComposer;
use App\Http\ViewComposers\SidebarMfoComposer;
use App\Http\ViewComposers\SidebarNewsComposer;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['front.partials.default_header', 'layouts.app-amp'], NavigationComposer::class);

        //view()->composer('front.partials.last_news', LastNewsComposer::class);

        //view()->composer('front.partials.blog.sidebar_news', SidebarNewsComposer::class);

        //view()->composer('front.partials.sidebar_credit_card', SidebarCreditCardComposer::class);

        //view()->composer('front.partials.sidebar_credit_cash', SidebarCreditCashComposer::class);

        //view()->composer('front.partials.sidebar_mfo', SidebarMfoComposer::class);

        //view()->composer('front.partials.sidebar_bank', SidebarBankComposer::class);
    }
}
