<?php

use Illuminate\Support\Facades\Route;

Route::resource('products', 'ProductController')
->except('show');//->middleware('auth');
Route::get('products/show/{product}', 'ProductController@show')->name('products.show');
Route::get('products/all/delete', 'ProductController@deleteAll')->name('products.deleteAll');
Route::any('products/search', 'ProductController@search')->name('products.search');

/** 
    Remoção do código abaixo para utilizar o resource do Laravel
 */

/* 
Route::group([
    'prefix' => 'products',
], function(){
    Route::get('/', 'ProductController@index')->name('index');
    Route::get('/{productId}', 'ProductController@showOne')->name('showOne');
    Route::get('/insert/{name}/{quantity}/{value}', 'ProductController@insert')->name('insert');
    Route::get('/alter/{productId}/{name}/{quantity}/{value}', 'ProductController@alter')->name('alter');
    Route::get('/delete/{productId}', 'ProductController@delete')->name('delete');
}
);


/**
    Referência didática sobre route
*/
/*
Route::get('/login', function(){
    return "Login de autenticação!";
})->name('login');


Route::group([
    'middleware' => ['auth'],
    'prefix'     => 'admin',
    'namespace'  => 'Admin',
    'name'       => 'admin.' 
], function(){
        Route::get('/dashboard', 'TesteController@teste')->name('dashboard');

        Route::get('/product', 'TesteController@teste')->name('product');

        Route::get('/', function(){
            return redirect()->route('dashboard');
        })->name('home');
});
*/

Route::get('/', function () {
    return view('welcome');
});
