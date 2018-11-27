<?php

Route::get('/', 'Frontend\HomeController@index')->name('home');
Route::get('/shop', 'Frontend\HomeController@shop')->name('shop');
Route::get('/product/{id}', 'Frontend\HomeController@product')->name('product');
Route::get('/about', 'Frontend\HomeController@about')->name('about');
Route::get('/contact', 'Frontend\HomeController@contact')->name('contact');
Route::post('/feedback', 'Frontend\HomeController@feedback')->name('feedback');
Route::match(['get', 'post'], '/login', 'Frontend\HomeController@login')->name('login');
Route::match(['get', 'post'], '/register', 'Frontend\HomeController@register')->name('register');
Route::get('/logout', 'Frontend\HomeController@logout')->name('logout');
Route::post('/profile', 'Frontend\HomeController@profile')->name('profile');

// Cart
Route::group(['middleware' => 'auth'], function() {
    Route::get('/cart','Frontend\CartController@index')->name('cart.index');
    Route::post('/cart','Frontend\CartController@add')->name('cart.add');
    Route::post('/cart/update/{id}','Frontend\CartController@update')->name('cart.update');
    Route::delete('/cart/{id}','Frontend\CartController@delete')->name('cart.delete');
    Route::post('/checkout','Frontend\CartController@checkout')->name('checkout');
});

Route::match(['get', 'post'], 'admin/login', 'Backend\DashboardController@login')->name('admin.login');

Route::group(['middleware' => 'admin', 'prefix' => 'admin/'], function() {
    Route::get('', 'Backend\DashboardController@dashboard')->name('dashboard');
    Route::get('logout', 'Backend\DashboardController@logout')->name('admin.logout');
    Route::match(['get', 'post'], 'profile', 'Backend\DashboardController@profile')->name('admin.profile');
    Route::resource('categories', 'Backend\CategoryController');
    Route::resource('sliders', 'Backend\SliderController');
    Route::resource('products', 'Backend\ProductController');
    Route::resource('customers', 'Backend\CustomerController');
    Route::resource('feedback', 'Backend\FeedbackController');
});
