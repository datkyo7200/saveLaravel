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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/','ProductController@show');
Route::get('cart/show','CartController@show')->name('cart.show');

Route::get('cart/add/{id}','CartController@add')->name('cart.add');
Route::get('cart/remove/{rowId}','CartController@remove')->name('cart.remove');
Route::get('cart/destroy','CartController@destroy')->name('cart.destroy');
Route::get('cart/update','CartController@update')->name('cart.update');
// Route::get('cart/update', 'CartController@update');
Route::patch('update-cart', 'CartController@update');
Route::delete('remove-from-cart', 'CartController@remove');



Route::middleware('auth')->group(function(){

    Route::get('dashboard','DashboardController@show')->middleware('verified');

    Route::get('admin','DashboardController@show');

    Route::get('admin/user/list','AminUserController@list');

    Route::get('admin/user/add','AminUserController@add');

    Route::post('admin/user/store','AminUserController@store');

    Route::get('admin/user/delete/{id}','AminUserController@delete')->name('delete_user');

    Route::get('admin/user/action','AminUserController@action');

    Route::get('admin/user/edit/{id}','AminUserController@edit')->name('edit_user');
    Route::post('admin/user/update/{id}','AminUserController@update')->name('user.update');

});
Route::middleware('CheckRole')->group(function(){

    #DASHBOARD
    Route::get('dashboard','DashboardController@show');
    Route::get('admin','DashboardController@show');
    #USER
    Route::get('admin/user/list','AminUserController@list');
    Route::get('admin/user/add','AminUserController@add');
    Route::post('admin/user/store','AminUserController@store');
    Route::get('admin/user/delete/{id}','AminUserController@delete')->name('delete_user');
    Route::get('admin/user/action','AminUserController@action');
    Route::get('admin/user/edit/{id}','AminUserController@edit')->name('edit_user');
    Route::post('admin/user/update/{id}','AminUserController@update')->name('user.update');
    #ORDER
    Route::get('admin/order/list', 'AdminOrderController@list');
});

Route::get('login/login', 'LoginController@show');
Route::get('sanpham/show', 'SanPhamController@show');
