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

use App\Product;

Route::get('/', 'FrontController@index')->name('home');


Route::get('/shop','ShopController@index')->name('shop.index');
Route::get('/shop/search','ShopController@search')->name('shop.search');
Route::get('/shop/{slug}','ShopController@show')->name('shop.show');
Route::group(['prefix'=>'cart'],    function ()
{

    Route::get('/','CartController@index')->name('cart.index');
    Route::get('/add/{slug}','CartController@add')->name('cart.add');
    Route::get('remove/{rowID}','CartController@remove')->name('cart.remove');
    Route::get('destroy','CartController@destroy')->name('cart.destroy');
    Route::get('saveforlater/{rowId}','CartController@saveForLater')->name('cart.saveforlater');
    Route::get('saveforlater/remove/{rowId}','CartController@removeSaveForLater')->name('cart.remove.saveforlater');
    Route::put('update','CartController@update')->name('cart.update');



});
Route::group(['prefix'=>'checkout'],function()
{

    Route::get('/','CheckoutController@index')->name('checkout.index');
    Route::post('/store','CheckoutController@store')->name('checkout.store');

});




//Route::get('');
