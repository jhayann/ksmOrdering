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
Route::group(['middleware'=> ['web']], function(){
            Route::get('/', [
                    'uses' =>   'PagesController@index',
                    'as' => 'index'
            ]);
            Route::group(['prefix' => 'admin'], function(){
                Route::get('/{page}',[
                    'uses' => 'dashboardController@index',
                    'as' => 'admin'
                ]);                    
            }); 
Route::post('/customerlist',[
        'uses' => 'PagesController@customerlist',
        'as' => 'customerlist'
]); 
Route::post('/customerlistProcessor',[
    'uses' => 'dashboardController@resellerDataProccessor',
    'as' => 'dataProccessor'
]); 
 Route::post('/adminlist',[
                    'uses' => 'PagesController@adminlist',
                    'as' => 'adminlist'
                ]);
 Route::post('/create_admin',[
                    'uses' => 'PagesController@createadmin',
                    'as' => 'create_admin'
                ]);
Route::post('/insert_admin',[
                        'uses' => 'dashboardController@insertadmin',
                    'as' => 'insert_admin'
]); 
});

/*
|--------------------------------------------------------------------------
| Web auth API
|--------------------------------------------------------------------------*/
Route::group(['prefix' => 'api'], function()
{
    Route::resource('authenticate/', 'AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthenticateController@authenticate');
    Route::get('getprofile','AuthenticateController@getProfile');
});

/*
|--------------------------------------------------------------------------
| Auth Resource Route
|--------------------------------------------------------------------------*/

Auth::routes();
Route::get('/admin', 'dashboardController@index');

/*
|--------------------------------------------------------------------------
|Customer resource route
|--------------------------------------------------------------------------*/

Route::group(['prefix' => 'customer'], function()
{
   Route::get('/login',[
        'uses' => 'CustomerController@index',
        'as' => 'customerLogin'
   ]);
   Route::post('/session',[
    'uses' => 'CustomerController@setSession',
    'as' => 'setSession'
]);
   Route::get('/home',[
    'uses' => 'CustomerController@home',
    'as' => 'customer.showHome'
]);
Route::get('/logout',[
    'uses' => 'CustomerController@logout',
    'as' => 'customer.logout'
]);
   Route::post('/auth',[
    'uses' => 'CustomerController@authenticate',
    'as' => 'customerAuth'
   ]);
});
