<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

//==================================================================================
//==================================================================================
//Admin==================================================================================
//==================================================================================
//==================================================================================

Route::group(
    [
        'prefix' => 'admin',
        'as' => 'admin.',
        'namespace' => 'Admin',
        'middleware' => ['auth', 'role:admin|editor'],
    ],
    function () {

        Route::get('/', 'HomeController@index')->name('dashboard');

        Route::get('/edit-account', 'AccountController@edit')->name('account.edit');
        Route::put('/edit-account', 'AccountController@update');


        Route::get('/seo', 'SeoController@edit')->name('seo.edit');
        Route::put('/seo', 'SeoController@update');

        /*Route::get('/comments/new', 'CommentController@newComments')->name('comments.new_list');
        Route::post('/comments/delete-all', 'CommentController@all')->name('comments.delete.all');
        Route::resource('comments', 'CommentController');*/


        Route::middleware(['role:admin'])->resource('users', 'UsersController');

        Route::group(['prefix' => 'blog', 'as' => 'blog.', 'namespace' => 'Blog'], function () {

            Route::resource('pages', 'PageController');
            Route::post('/pages/action/all', 'PageController@all')->name('pages.all');

            Route::resource('posts', 'PostController');
            Route::post('/posts/action/all', 'PostController@all')->name('posts.all');

            Route::resource('posts', 'PostController');
            Route::post('/posts/action/all', 'PostController@all')->name('posts.all');

            Route::resource('categories', 'CategoryController');
            Route::post('/categories/action/all', 'CategoryController@all')->name('categories.all');

            Route::resource('tags', 'TagController');
            Route::post('/tags/action/all', 'TagController@all')->name('tags.all');
        });

        Route::group(['prefix' => 'organizations', 'as' => 'organizations.', 'namespace' => 'Organization'], function () {

            Route::resource('mfo', 'MfoController');
            Route::post('/mfo/action/all', 'MfoController@all')->name('mfo.all');

            Route::resource('banks', 'BankController');
            Route::post('/banks/action/all', 'BankController@all')->name('banks.all');
        });

        Route::group(['prefix' => 'products', 'as' => 'products.', 'namespace' => 'Product'], function () {

            Route::resource('credit-cards', 'CreditCardController');
            Route::post('/credit-cards/action/all', 'CreditCardController@all')->name('credit.cards.all');

            Route::resource('credit-cash', 'CreditCashController');
            Route::post('/credit-cash/action/all', 'CreditCashController@all')->name('credit.cash.all');
        });

        Route::group(['prefix' => 'lists', 'as' => 'lists.', 'namespace' => 'Lists'], function () {

            Route::resource('mfo', 'ListMfoController')->parameters([
                'mfo' => 'list_mfo'
            ]);;
            Route::post('/mfo/action/all', 'ListMfoController@all')->name('mfo.all');

        });

    }
);


//==================================================================================
//==================================================================================
//Front=================================================================================
//==================================================================================
//==================================================================================
Route::get('/', 'HomeController@index')->name('home');

//Route::get('/37905.html', 'HomeController@iformer');

Route::namespace('Front')->group(function (){

    Route::get('/banki', 'BankController@all')->name('banki');
    Route::get('/karty', 'CreditCardController@allCards')->name('karty');
    Route::get('/credity', 'CreditCashController@allCredits')->name('credity');

    Route::group(
        [
            'prefix' => 'bank/{bank}',
            'as' => 'bank.',
        ],
        function () {
            Route::get('/', 'BankController@single')->name('single');

            Route::get('/karty', 'CreditCardController@bankCards')->name('karty');

            Route::get('/karty/{creditCard}', 'CreditCardController@single')->name('karta');

            Route::get('/credity', 'CreditCashController@bankCredits')->name('credity');

            Route::get('/credity/{creditCash}', 'CreditCashController@single')->name('credit');

        }
    );



    Route::group(
        [
            'prefix' => 'mfo',
            'as' => 'mfo.',
        ],
        function () {
            Route::get('/', 'MfoController@all')->name('all');
            Route::get('/{mfo}', 'MfoController@single')->name('single');
        }
    );



    /*Route::group(
        [
            'prefix' => 'rss',
            'as' => 'rss.',
        ],
        function () {
            Route::get('/ukr-net-channel.rss', 'RssController@ukrNetChannel')->name('ukr.net.channel');
        }
    );*/

    Route::get('/novosti', 'CategoryController@all')->name('news');

    Route::get('/novosti', 'CategoryController@all')->name('news');

    Route::get('/novosti/rubrika/{category}', 'CategoryController@single')->name('category');

    Route::group(
        [
            'prefix' => 'tag',
            'as' => 'tag.',
        ],
        function () {
            Route::get('/{slug}', 'TagController@single')->name('single');
        }
    );

    Route::group(
        [
            'prefix' => 'author',
            'as' => 'author.',
        ],
        function () {
            Route::get('/{slug}', 'AuthorController@single')->name('single');
        }
    );



    Route::middleware('ajax')->post('/ajax/{action}', 'AjaxController@index');


});

Route::get('/{slug}/amp', 'HomeController@showAmp')->name('amp.page');
Route::get('/{slug}', 'HomeController@show')->name('page');

/*Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});*/


/*Route::get('/.well-known/pki-validation/0D8CFB50A9F4927867760BDD219E6123.txt', function(){
    return "73f6b3d5d04a49c368ac234b595b7c3c16803a13f9968d41f68d39f3f38274c8\n".PHP_EOL."comodoca.com\n".PHP_EOL."CettLUm6Hw1iZ6qM3zLX";
});*/
