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

Route::get('/','HomeController@index')->name('home');

Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home');*/



// ===========================  FRONTENED ROUTE IS GO HERE =====================  ///

Route::get('/category-products/{slug}','HomeController@category_products')->name('category.product');

Route::get('/manufacture-products/{slug}','HomeController@manufacture_products')->name('manufacture.product');

Route::get('/product/{id}','HomeController@show_product')->name('product.show');

Route::get('/products','HomeController@all_products')->name('product.index');

Route::get('/contact','HomeController@contact')->name('contact.index');

		//===========     Cart Route is Here =============  //
Route::post('/add-cart','CartController@add_cart')->name('cart.add');

Route::get('/show-cart','CartController@show_cart')->name('cart.show');

Route::get('/delete-cart/{id}','CartController@delete_cart')->name('cart.delete');

Route::post('/update-cart/{id}','CartController@update_cart')->name('cart.update');

	  //===========     Checkout Route is Here =============  //
Route::get('/login-check','CheckoutController@login')->name('login.check');
Route::get('/checkout','CheckoutController@checkout')->name('checkout.index');


	 //===========     Customer Route is Here =============  //

Route::post('/customer-registration','CustomerLoginController@customer_registration')->name('customer.registration');
Route::post('/customer-login','CustomerLoginController@customer_login')->name('customer.login');

Route::get('/customer-logout','CustomerLoginController@customer_logout')->name('customer.logout');
	
	//===========     Shipping Route is Here =============  //

Route::post('/shipping-store','ShippingController@shipping_store')->name('shipping.store');
Route::get('/paytment','ShippingController@payment_index')->name('payment.index');
Route::post('/order-place','ShippingController@order_place')->name('order.place');

















// ===========================  BACKEND ROUTE IS GO HERE =====================  ///
Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'Admin','as'=>'admin.'],function(){

	Route::get('/dashboard','DashboardController@index')->name('dashboard');

	// ===========================  CATEGORY ROUTE IS HERE =====================  ///
	Route::get('/all-category','CategoryController@index')->name('category.index');
	Route::get('/add-category','CategoryController@create')->name('category.create');
	Route::post('/add-category','CategoryController@store')->name('category.store');
	Route::get('/edit-category/{id}','CategoryController@edit')->name('category.edit');
	Route::post('/update-category/{id}','CategoryController@update')->name('category.update');
	Route::get('/delete-category/{id}','CategoryController@destroy')->name('category.destroy');
	Route::get('/unactive-category/{id}','CategoryController@unactive_category')->name('unactive.category');
	Route::get('/active-category/{id}','CategoryController@active_category')->name('active.category');



	// ===========================  MANUFACTURE ROUTE IS HERE =====================  ///
	Route::get('/all-manufacture','ManufactureController@index')->name('manufacture.index');
	Route::get('/add-manufacture','ManufactureController@create')->name('manufacture.create');
	Route::post('/add-manufacture','ManufactureController@store')->name('manufacture.store');
	Route::get('/edit-manufacture/{id}','ManufactureController@edit')->name('manufacture.edit');
	Route::post('/update-manufacture/{id}','ManufactureController@update')->name('manufacture.update');
	Route::get('/delete-manufacture/{id}','ManufactureController@destroy')->name('manufacture.destroy');
	Route::get('/unactive-manufacture/{id}','ManufactureController@unactive_manufacture')->name('unactive.manufacture');
	Route::get('/active-manufacture/{id}','ManufactureController@active_manufacture')->name('active.manufacture');


	// ===========================  PRODUCT ROUTE IS HERE =====================  ///
	Route::get('/all-product','ProductController@index')->name('product.index');
	Route::get('/add-product','ProductController@create')->name('product.create');
	Route::post('/add-product','ProductController@store')->name('product.store');
	Route::get('/edit-product/{id}','ProductController@edit')->name('product.edit');
	Route::post('/update-product/{id}','ProductController@update')->name('product.update');
	Route::get('/delete-product/{id}','ProductController@destroy')->name('product.destroy');
	Route::get('/unactive-product/{id}','ProductController@unactive_product')->name('unactive.product');
	Route::get('/active-product/{id}','ProductController@active_product')->name('active.product');

	// ===========================  SLIDER ROUTE IS HERE =====================  ///
	Route::get('/all-slider','SliderController@index')->name('slider.index');
	Route::get('/add-slider','SliderController@create')->name('slider.create');
	Route::post('/add-slider','SliderController@store')->name('slider.store');
	Route::get('/delete-slider/{id}','SliderController@destroy')->name('slider.destroy');
	Route::get('/unactive-slider/{id}','SliderController@unactive_slider')->name('unactive.slider');
	Route::get('/active-slider/{id}','SliderController@active_slider')->name('active.slider');


	// ===========================  ORDER ROUTE IS HERE =====================  ///
	Route::get('/all-order','OrderController@index')->name('order.index');
	Route::get('/view-order/{id}','OrderController@show')->name('order.show');
	Route::get('/active/{id}','OrderController@active')->name('active.order');


});

