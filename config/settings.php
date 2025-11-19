<?php
/**
 * User: Gamma-iron
 * Date: 24.06.2019
 */
return [

    /*
    |--------------------------------------------------------------------------
    | Global app settings
    |--------------------------------------------------------------------------
    */

    'perPage' => 10,


    'observers' => [
        App\Entity\Blog\Post::class => App\Observers\PostObserver::class,
        App\Entity\Organization\Bank::class => App\Observers\BankObserver::class,
        App\Entity\Organization\Mfo::class => App\Observers\MfoObserver::class,
        App\Entity\Product\CreditCash::class => App\Observers\CreditCashObserver::class,
        App\Entity\Product\CreditCard::class => App\Observers\CreditCardObserver::class,
    ],

];
