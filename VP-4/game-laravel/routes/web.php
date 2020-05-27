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

Route::get('/', 'SiteController@index');
Route::get('/site/company', 'SiteController@company');

//category
Route::get('categories/category/{id}', 'SiteController@category');
Route::get('/categories/{url}', 'SiteController@products');

//news
Route::get('news/news-index', 'SiteController@news');
Route::get('news/article/{id}', 'SiteController@article');

//account
Route::get('/user-register', 'UsersController@userRegister');
Route::get('/user-login', 'UsersController@userLogin');

Route::post('/register-user', 'UsersController@register');
Route::post('/login-user', 'UsersController@login');

Route::get('/logout-user', 'UsersController@logout');

//cart
Route::match(['get', 'post'], '/add-cart', 'ProductsController@addtocart');
Route::match(['get', 'post'], '/cart', 'ProductsController@cart');
Route::get('/cart/update-quantity/{id}/{quantity}', 'ProductsController@updateCartQuantity');
Route::get('/cart/delete-product/{id}', 'ProductsController@deleteCartProduct');

Route::match(['get', 'post'], '/payment/{id}', 'ProductsController@paymentProduct');

Auth::routes();
Route::match(['get', 'post'], '/admin', 'AdminController@login');
Route::get('/logout', 'AdminController@logout');

Route::group(['middleware' => ['frontlogin']], function() {
    Route::get('products/product/{id}', 'ProductsController@product');

    Route::match(['get', 'post'], '/account', 'UsersController@account');
    Route::match(['get', 'post'], '/checkout', 'ProductsController@checkout');

    Route::match(['get', 'post'], '/place-order', 'ProductsController@placeOrder');
    Route::get('/thanks', 'ProductsController@thanks');

    //user orders
    Route::get('/orders', 'ProductsController@userOrders');
    Route::get('/orders/{id}', 'ProductsController@userOrdersDetails');

    //mail
    Route::match(['get', 'post'], '/email/email-orders/{id}', 'ProductsController@emailOrder');
});

Route::group(['middleware' => ['adminlogin']], function() {
    Route::get('/admin/admin_index', 'AdminController@index');
    Route::get('/admin/settings', 'AdminController@settings');
    Route::get('/admin/check-pwd', 'AdminController@chkPasswrd');
    Route::match(['get', 'post'], '/admin/update-pwd', 'AdminController@updatePassword');

    //category
    Route::get('/admin/category/index', 'CategoryController@index');
    Route::match(['get', 'post'], '/admin/category/create', 'CategoryController@create');
    Route::match(['get', 'post'], '/admin/category/edit/{id}', 'CategoryController@edit');
    Route::match(['get', 'post'], '/admin/category/delete/{id}', 'CategoryController@delete');

    //products
    Route::get('/admin/products/index', 'ProductsController@index');
    Route::match(['get', 'post'], '/admin/products/create', 'ProductsController@create');
    Route::match(['get', 'post'], '/admin/products/edit/{id}', 'ProductsController@edit');
    Route::match(['get', 'post'], '/admin/products/delete/{id}', 'ProductsController@delete');

    //news
    Route::get('/admin/news/news-index', 'NewsController@index');
    Route::match(['get', 'post'], '/admin/news/news-create', 'NewsController@create');
    Route::match(['get', 'post'], '/admin/news/news-edit/{id}', 'NewsController@edit');
    Route::match(['get', 'post'], '/admin/news/news-delete/{id}', 'NewsController@delete');

    //orders
    Route::get('/admin/orders/orders', 'OrdersController@index');
    Route::get('/admin/orders/order/{id}', 'OrdersController@orderDetails');

    //email
    Route::get('/admin/email/index', 'EmailController@index');
    Route::match(['get', 'post'], 'admin/email/edit/{id}', 'EmailController@edit');
});
