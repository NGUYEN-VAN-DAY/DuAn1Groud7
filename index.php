<?php
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
ini_set('log_errors', TRUE); 
ini_set('error_log', './logs/php/php-errors.log');

use App\Helpers\AuthHelper;
use App\Route;

require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(paths: __DIR__);
$dotenv->load();
require_once 'config.php';

AuthHelper::middLeware();

//Client
Route::get(url: '/', controllerMethod: 'App\Controllers\Client\HomeController@index');
//Liên hệ
Route::get(url: '/contact', controllerMethod: '\App\Controllers\Client\ContactController@index');
Route::post(url: '/contact', controllerMethod: '\App\Controllers\Client\ContactController@handleContactForm');
Route::get(url: '/post', controllerMethod: 'App\Controllers\Client\PostController@index');

Route::get(url: '/pay', controllerMethod: 'App\Controllers\Client\PayController@index');
Route::get(url: '/momo', controllerMethod: 'App\Controllers\Client\MethodController@Momo');

//
Route::get(url: '/introduce', controllerMethod: 'App\Controllers\Client\IntroduceController@index');

//
Route::get(url: '/products', controllerMethod: 'App\Controllers\Client\ProductController@index');
Route::get(url: '/products/options', controllerMethod: 'App\Controllers\Client\ProductController@getFilterProduct');
Route::get(url: '/products/{id}', controllerMethod: 'App\Controllers\Client\ProductController@detail');
Route::get(url: '/products/categories/{id}', controllerMethod: 'App\Controllers\Client\ProductController@getProductByCategory');
Route::get(url: '/products/categories/{id}/options', controllerMethod: 'App\Controllers\Client\ProductController@getFilterbycategery');
Route::get(url: '/products/seach', controllerMethod: 'App\Controllers\Client\ProductController@getSeachProducts');
// giỏ hàng
Route::post('/cart/add', 'App\Controllers\Client\CartController@add');
    Route::get('/cart/remove/{id}', 'App\Controllers\Client\CartController@remove');
Route::get(url: '/cart', controllerMethod: 'App\Controllers\Client\CartController@index');
// bình luận
// Route::get(url: '/comments/{id}', controllerMethod: 'App\Controllers\Client\CommentController@edit');
Route::put(url: '/comments/{id}', controllerMethod: 'App\Controllers\Client\CommentController@edit');

Route::post(url: '/comments', controllerMethod: 'App\Controllers\Client\CommentController@store');
Route::put(url: '/comments/{id}', controllerMethod: 'App\Controllers\Client\CommentController@update');
Route::delete(url: '/comments/{id}', controllerMethod: 'App\Controllers\Client\CommentController@delete');
//đăng kí
Route::get('/register', 'App\Controllers\Client\AuthController@register');
Route::post('/register', 'App\Controllers\Client\AuthController@registerAction');
//đăng nhập
Route::get('/login', 'App\Controllers\Client\AuthController@login');
Route::post('/login', 'App\Controllers\Client\AuthController@loginAction');
//đăng xuất
Route::get('/logout', 'App\Controllers\Client\AuthController@logout');
//cập nhật
Route::get('/users/{id}','App\Controllers\Client\AuthController@edit');
Route::put('/users/{id}','App\Controllers\Client\AuthController@update');
//đổi mật khẩu
Route::get('/change-password','App\Controllers\Client\AuthController@changePassword');
Route::put('/change-password','App\Controllers\Client\AuthController@changePasswordAction');
//
Route::get('/forgot-password','App\Controllers\Client\AuthController@forgotPassword');
Route::post('/forgot-password','App\Controllers\Client\AuthController@forgotPasswordAction');
//lay61 lai mk
Route::get('/reset-password','App\Controllers\Client\AuthController@resetPassword');
Route::put('/reset-password','App\Controllers\Client\AuthController@resetPasswordAction');
//
Route::get('/my_account', 'App\Controllers\Client\My_accountController@index');
Route::get('/contact', 'App\Controllers\Client\ContactController@index');
//Admin
Route::get('/admin', 'App\Controllers\Admin\HomeController@index');
//Category
Route::get('/admin/categories', 'App\Controllers\Admin\CategoryController@index');
Route::get('/admin/categories/create', 'App\Controllers\Admin\CategoryController@create');
Route::post('/admin/categories', 'App\Controllers\Admin\CategoryController@store');
Route::get('/admin/categories/{id}', 'App\Controllers\Admin\CategoryController@edit');
Route::put('/admin/categories/{id}', 'App\Controllers\Admin\CategoryController@update');
Route::delete('/admin/categories/{id}', 'App\Controllers\Admin\CategoryController@delete');
//Product
Route::get('/admin/products', 'App\Controllers\Admin\ProductController@index');
Route::get('/admin/products/create', 'App\Controllers\Admin\ProductController@create');
Route::post('/admin/products', 'App\Controllers\Admin\ProductController@store');
Route::get('/admin/products/{id}', 'App\Controllers\Admin\ProductController@edit');
Route::put('/admin/products/{id}', 'App\Controllers\Admin\ProductController@update');
Route::delete('/admin/products/{id}', 'App\Controllers\Admin\ProductController@delete');
//Users
Route::get('/admin/users', 'App\Controllers\Admin\UserController@index');
Route::get('/admin/users/create', 'App\Controllers\Admin\UserController@create');
Route::post(url: '/admin/users', controllerMethod: 'App\Controllers\Admin\UserController@store');
Route::get('/admin/users/{id}', 'App\Controllers\Admin\UserController@edit');
Route::put('/admin/users/{id}', 'App\Controllers\Admin\UserController@update');
Route::delete('/admin/users/{id}', 'App\Controllers\Admin\UserController@delete');
Route::get(url: '/admin/users/seach', controllerMethod: 'App\Controllers\Admin\UserController@getSearchUsers');

//Comment
Route::get('/admin/comments', 'App\Controllers\Admin\CommentController@index');

Route::get('/admin/comments/{id}', 'App\Controllers\Admin\CommentController@edit');

Route::put('/admin/comments/{id}', 'App\Controllers\Admin\CommentController@update');

Route::delete('/admin/comments/{id}', 'App\Controllers\Admin\CommentController@delete');

Route::post('/admin/historys', 'App\Controllers\Admin\HistoryController@index');
//history
//post
Route::post('/admin/posts', 'App\Controllers\Admin\PostController@index');

Route::dispatch($_SERVER['REQUEST_URI']);
