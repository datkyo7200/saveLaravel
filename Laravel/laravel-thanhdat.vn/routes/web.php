<?php

use App\User;

use App\Product;
use App\Role;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
Route::get('/','ProductController@show');
Route::get('cart/show','CartController@show');
Route::get('cart/add/{id}','CartController@add')->name('cart.add');

Route::get('cart/remove/{rowId}','CartController@remove')->name('cart.remove');
Route::get('cart/destroy','CartController@destroy')->name('cart.destroy');
Route::get('cart/update','CartController@update')->name('cart.update');



Route::get('sanpham/show','SanPhamController@show');
Route::get('product/detail/{id}','ProductController@detail')->name('product.detail');
Route::get('product/search','ProductController@search')->name('product.search');

// Route::get('users/insert', function () {
//     DB::table('users')->insert(
//         ['name'=>'hoangtri','email'=>'hoangtri@gmail.com','password'=>bcrypt('123456')]
//     );
// });

// Route::get('product/add', 'ProductController@add');
// Route::get('product/show', 'ProductController@show');
// Route::get('product/update/{id}', 'ProductController@update');
// Route::get('product/delete/{id}', 'ProductController@delete');
// Route::get('product/read','ProductController@read');
// Route::get('product/restore/{id}','ProductController@restore');
// Route::get('product/permanentlyDelete/{id}','ProductController@permanentlyDelete');

// Route::get('images/read','FeaturedImageController@read');
// Route::get('role/read','RoleController@read');
// // Route::get('products/read', function () {
// //     $products = Product::all();
// //     return $products;
// // });
// //FORM
Route::get('post/add','PostController@add');
Route::get('post/show','PostController@show')->name('post.show');
Route::post('post/store','PostController@store');

// Route::get('helper/url','HelperController@url');
// Route::get('helper/string','HelperController@string');

// Route::get('user/reg', function () {
//     return view('user/reg');
// });

// Route::get('session/add','SessionController@add');
// Route::get('session/addflash','SessionController@add_flash');
// Route::get('session/show','SessionController@show');
// Route::get('session/delete','SessionController@delete');

// Route::get('cookie/set','CookieController@set');
// Route::get('cookie/get','CookieController@get');

// Route::get('demomail/sendmail','DemoMailController@sendMail');

// Route::group(['prefix' => 'laravel-filemanager'], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });
