<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

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

/* routes for user Website */

Route::get('/', 'Website\ProductController@index');
Route::resource('products', 'Website\ProductController')->only('show');
Route::post('/customers/login', 'Website\CustomerController@login');
Route::get('/customers/logout', 'Website\CustomerController@logout');
Route::resource('customers', 'Website\CustomerController');
Route::resource('carts', 'Website\CartController',['parameters' => [
    'carts' => 'product'
]]);



/* routes for admin dashboard */
Route::get('admin/login', function () {
    return view('admin/login');
});
Route::post('/admin/login/check', 'UserController@login');

Route::middleware('admin_check')->group(function () {
    Route::get('/admin/logout', 'UserController@logout');
    Route::get('dashboard', function () {
        return view('admin/dashboard');
    });
    Route::resource('admin/products', 'ProductController');
    Route::resource('/admin/customers', 'CustomerController');
    Route::resource('/admin/orders', 'OrderDetailController',['parameters' => [
        'orders' => 'orderDetail'
    ]]);
    Route::resource('admin', 'UserController');
    Route::resource('categories', 'CategoryController');
    Route::resource('brands', 'BrandController');

});




// Route::get('admin/list', function () {
//     return view('admin/list');
// });

// Route::get('admin/customers', function () {
//     return view('admin/customers');
// });

// Route::get('check', function () {
//     return view('admin/edit');
// });

