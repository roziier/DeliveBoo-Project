<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

//dashboard
Route::get('/home', 'HomeController@index')
    -> name('home');
Route::post('typ-store', 'HomeController@typstore') 
    -> name('typ-store');
Route::get('/','TypologyController@index')
    -> name('welcome');
Route::get('/show/typology/{id}', 'TypologyController@show')
    -> name('typ-show');
//index
Route::get('/index/menu/{id}', 'UserMenuController@getMenu')
    -> name('user-menu-index');
//show
Route::get('/show/menu/{id}', 'UserMenuController@show')
    -> name('user-menu-show');

//RISTORANTE
//img upload (restaurant) (HomeController)
Route::post('/update/img-user', 'HomeController@updateLogo')
    -> name('update-logo');
Route::get('/clear/img-user', 'HomeController@clearLogo')
    -> name('clear-logo');
    
//DISHES
Route::get('/dishes', 'DishController@index')   
    -> name('dish-index');
//dishes create-store
Route::get('/create/dish', 'DishController@create')
    -> name('dish-create');
Route::post('/store/dish', 'DishController@store')
    -> name('dish-store');
//dishes edit-update
Route::get('/edit/dish/{id}', 'DishController@edit')
    -> name('dish-edit');
Route::post('/update/dish/{id}', 'DishController@update')
    -> name('dish-update');
//dishes delete
Route::get('/delete/dish/{id}', 'DishController@delete')
    -> name('dish-delete');
//img upload (dishes) (DishController)
Route::post('/update/img-dish', 'DishController@updateLogo')
    -> name('update-logo-dish');
    
//ORDERS
Route::get('/orders', 'OrderController@index') 
    -> name('order-index');

Route::get('/show/order/{id}', 'OrderController@show')
    -> name('order-show');
    //orders-stats
Route::get('/stats', 'OrderController@stats') 
    -> name('order-stats');
    
//Typologies filter
Route::get('/typs/filter', 'TypologyController@getTyps')
    -> name('typs-filter');

//braintree
Route::get('/braintree', 'UserMenuController@braintreeForm') 
    -> name('braintree-index');
Route::post('/braintree-checkout', 'UserMenuController@braintreePayment') 
    -> name('braintree-payment');


