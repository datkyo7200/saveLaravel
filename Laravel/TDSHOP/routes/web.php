<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
// USER
Route::get('/','HomeController@index');
Route::get('home','HomeController@index');
Route::get('index','HomeController@index');

Route::get('cart/show','CartController@show');
Route::get('cart','CartController@show');
Route::get('cart/add','CartController@add')->name('cart.add');
Route::get('cart/update','CartController@update')->name('cart.update');
Route::delete('remove-from-cart', 'CartController@remove');
Route::get('cart/destroy', 'CartController@destroy')->name('cart.destroy');

Route::get('product/detail/{id}','ProductController@detail')->name('product.detail');
Route::get('product/search','ProductController@search')->name('product.search');

Route::get('introduce','IntroduceController@show');

Route::get('customer/login','CustomerController@login')->name('customer.login');

Route::get('news','NewsController@show');


// ADMIN
Auth::routes(['verify' => true]);
Route::get('admin','AdminController@index');
Route::get('admin/login','AdminController@index');
Route::post('admin','AdminController@loginAdmin')->name('admin.login');
Route::get('admin/logout','AdminController@logoutAdmin')->name('admin.logout');

Route::middleware('CheckLogin')->group(function(){
    //Danh sách route
    Route::get('dashboard','DashboardController@show');

    Route::get('admin/user/list','AdminUserController@list');
    Route::get('admin/user/add','AdminUserController@add');
    Route::post('admin/user/store','AdminUserController@store')->name('admin.user.store');
    Route::get('admin/user/edit/{id}','AdminUserController@edit')->name('admin.user.edit');
    Route::post('admin/user/update/{id}','AdminUserController@update')->name('user.update');
    Route::get('admin/user/delete/{id}','AdminUserController@delete')->name('admin.user.delete');
    Route::get('admin/user/action','AdminUserController@action');

    Route::get('admin/product/list','AdminProductController@list')->name('admin.product.list');
    Route::get('admin/product/add','AdminProductController@add');
    Route::post('admin/product/store', 'AdminProductController@store')->name('admin.product.store');
    Route::get('admin/product/edit/{id}','AdminProductController@edit');
    Route::post('admin/product/update/{id}', 'AdminProductController@update')->name('admin.product.update');
    Route::get('admin/product/category','AdminProductController@category');

    Route::get('admin/page/list','AdminPageController@list');
});

