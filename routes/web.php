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
                    'as' => 'index.main'
            ]);
            Route::group(['prefix' => 'admin'], function(){
                Route::get('/{page}',[
                    'uses' => 'dashboardController@index',
                    'as' => 'admin'
                ]);         
                  Route::get('/product/create',[
                    'uses' => 'PagesController@createProduct',
                    'as' => 'create.product'
                ]);    
                 Route::post('/product/store',[
                    'uses' => 'dashboardController@storeProduct',
                    'as' => 'store.product'
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
Route::post('delete',[
                    'uses' => 'dashboardController@deleteadmin',
                    'as' => 'deleteadmin'
]); 
 Route::post('/productlist',[
                    'uses' => 'PagesController@productlist',
                    'as' => 'productlist'
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
Route::get('/',[
'uses' => 'CustomerController@home',
'as' => 'customer.showHome'
]);
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
Route::get('/desktop/home',[
'uses' => 'CustomerController@desktopHome',
'as' => 'customer.showDesktopHome'
]);
Route::get('/desktop/profile',[
'uses' => 'CustomerController@desktopProfile',
'as' => 'customer.showDesktopProfile'
]);
Route::get('/desktop/products',[
'uses' => 'CustomerController@showProduct',
'as' => 'customer.showDesktopProduct'
]);
Route::get('desktop/logout',[
'uses' => 'CustomerController@logout',
'as' => 'customer.logout'
]);
Route::post('/auth',[
'uses' => 'CustomerController@authenticate',
'as' => 'customerAuth'
]);
Route::get('/register',
[
'uses' => 'CustomerController@register',
'as' => 'customer.register'
]);
Route::post('/create',
[
'uses' => 'CustomerController@store',
'as' => 'customer.store'
]);
/*
|--------------------------------------------------------------------------
|Customer Password Reset
|--------------------------------------------------------------------------*/
Route::get('password/reset',[
    'uses' => 'CustomerPassword\ForgotPasswordController@showLinkRequestForm',
    'as' => 'customer.password.request'
]);
Route::post('password/email',[
    'uses' => 'CustomerPassword\ForgotPasswordController@sendResetLinkEmail',
    'as' => 'customer.password.email'
]);
Route::get('password/reset/{token}',[
    'uses' => 'CustomerPassword\ResetPasswordController@showResetForm',
    'as' => 'customer.password.reset'
]);
Route::post('password/reset',[
    'uses' => 'CustomerPassword\ResetPasswordController@reset'
    
]);

});
