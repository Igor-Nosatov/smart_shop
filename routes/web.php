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
   'reset' => false,
   'confirm' => false,
   'verify' => false,
]);

Route::group([
   'middleware' => 'auth',
   'namespace' => 'Admin',
], function () {
   Route::group(['middleware' => 'is_admin'], function () {
      Route::get('/orders', 'OrderController@index')->name('home');
   });
});

Route::get('/logout', 'Auth\LoginController@logout')->name('get-logout');

Route::get('/', 'MainController@index')->name('index');

Route::group(['prefix' => 'basket'], function () {
   Route::post('/add/{id}', 'BasketController@basketAdd')->name('basket-add');

   Route::group([
      'middleware' => 'basket_not_empty',
   ], function () {
      Route::get('/', 'BasketController@basket')->name('basket');
      Route::get('/place', 'BasketController@basketPlace')->name('basket-place');
      Route::post('/remove/{id}', 'BasketController@basketRemove')->name('basket-remove');
      Route::post('/place', 'BasketController@basketConfirm')->name('basket-confirm');
   });
});

Route::get('/categories', 'MainController@categories')->name('categories');

Route::get('/{category}', 'MainController@category')->name('category');

Route::get('/{category}/{product?}', 'MainController@product')->name('product');
