<?php

Auth::routes();

Route::prefix('admin')->name('admin.')->namespace('Admin')->middleware('auth')->group(function() {
Route::get('/',function(){
return redirect()->route('admin.prd.index');
});
	Route::namespace('Prd')->group(function(){
		// Group sản phẩm
Route::prefix('san-pham')->name('prd.')->group(function(){
Route::get('/', 'PrdController@index')->name('index');
Route::post('/', 'PrdController@create');
Route::post('update/{id}','PrdController@update')->name('update');
Route::get('/edit/{id}', 'PrdController@edit')->name('edit');
Route::get('/delete/{id}', 'PrdController@delete')->name('delete');
Route::post('/add_attr/{id}','PrdController@addAttr');
Route::get('/delete_attr/{attr_id}/{prd_id}', 'PrdController@delete_attr')->name('delete_attr');
});
//Kết thức sản phẩm
// Group danh mục
Route::prefix('danh-muc')->name('cat.')->group(function(){
Route::get('/', 'CatController@index')->name('index');
Route::post('/', 'CatController@create');
Route::get('/edit/{id}', 'CatController@edit')->name('edit');
Route::post('/update/{id}', 'CatController@update')->name('update');
Route::get('/delete/{id}', 'CatController@delete')->name('delete');
});
//Kết thức group danh mục
// Group nhóm thuộc tính
Route::prefix('nhom-thuoc-tinh')->name('attr_gr.')->group(function(){
Route::get('/', 'AttrGrController@index')->name('index');
Route::post('/', 'AttrGrController@create');
Route::get('/edit/{id}', 'AttrGrController@edit')->name('edit');
Route::post('/update/{id}', 'AttrGrController@update')->name('update');
Route::get('/delete/{id}', 'AttrGrController@delete')->name('delete');
Route::post('/add_attr/{id}','AttrGrController@addAttr');
Route::get('/delete_attr/{attr_id}/{attr_gr_id}', 'AttrGrController@delete_attr')->name('delete_attr');
});
//Kết thúc group nhóm thuộc tính
// Group thuộc tính
Route::prefix('thuoc-tinh')->name('attr.')->group(function(){
Route::get('/', 'AttrController@index')->name('index');
Route::post('/', 'AttrController@create');
Route::get('/edit/{id}', 'AttrController@edit')->name('edit');
Route::post('/update/{id}', 'AttrController@update')->name('update');
Route::get('/delete/{id}', 'AttrController@delete')->name('delete');
});
//Kết thúc group thuộc tính
// Group thuộc tính
Route::prefix('thuong-hieu')->name('brand.')->group(function(){
Route::get('/', 'BrandController@index')->name('index');
Route::post('/', 'BrandController@create');
Route::get('/edit/{id}', 'BrandController@edit')->name('edit');
Route::post('/update/{id}', 'BrandController@update')->name('update');
Route::get('/delete/{id}', 'BrandController@delete')->name('delete');
});
//Kết thúc group thuộc tính
	});
// Kết thúc namespace Prd

// Banner
Route::prefix('banner')->name('banner.')->group(function(){
Route::get('/', 'BannerController@index')->name('index');
Route::post('/', 'BannerController@create');
Route::get('/edit/{id}', 'BannerController@edit')->name('edit');
Route::post('/update/{id}', 'BannerController@update')->name('update');
Route::get('/delete/{id}', 'BannerController@delete')->name('delete');
});
// End Banner
// post
Route::prefix('bai-viet')->name('post.')->group(function(){
Route::get('/', 'PostController@index')->name('index');
Route::post('/', 'PostController@create')->name('create');
Route::get('/edit/{slug}', 'PostController@edit')->name('edit');
Route::post('/update/{slug}', 'PostController@update')->name('update');
Route::get('/delete/{slug}', 'PostController@delete')->name('delete');
});
// End post
// setting
Route::prefix('cai-dat')->name('setting.')->group(function(){ 
Route::get('/', 'SettingController@index')->name('index');
Route::post('/update', 'SettingController@update')->name('update');
});
// End setting
// Order
Route::namespace('Order')->group(function(){
Route::prefix('don-hang')->name('order.')->group(function(){ 
Route::get('/', 'OrderController@index')->name('index');
Route::get('/edit/{order_number}', 'OrderController@edit')->name('edit');
Route::post('/update/{order_number}', 'OrderController@update')->name('update');
});});
// End order
});

Route::name('front.')->namespace('Front')->group(function(){
Route::get('/','PageController@index')->name('index');
Route::get('/san-pham/{slug}','PrdController@show')->name('product-detail');
Route::get('/san-pham/','PrdController@all')->name('product-list');
Route::post('/search','CatController@search')->name('search');
Route::get('/tin-tuc-cong-nghe','PostController@list')->name('post-list');
Route::get('/danh-muc/{slug}','CatController@show')->name('category-list');
Route::post('/cat-filter','CatController@filter')->name('prd_filter');
Route::get('/thong-tin-dat-hang','PageController@cart')->name('check_out_1');
Route::get('/thanh-toan','PageController@payment')->name('thanh_toan');
Route::post('/add-to-cart/{id}','PrdController@addToCart')->name('add_to_cart');
Route::post('/buy-now/{id}','PrdController@buyNow')->name('buy_now');
Route::post('/view-more','PostController@viewMore')->name('view-more');
Route::post('/ajax-update-cart','CartController@ajaxUpdateCart')->name('ajax_update_cart');
Route::post('/ajax-remove-item','CartController@ajaxRemoveItem')->name('ajax_remove_item');
Route::post('/checkout2','CartController@checkOut2')->name('check_out_2');
Route::post('/checkout3','CartController@checkOut3')->name('check_out_3');
Route::get('/hoan-tat-don-hang/','CartController@success')->name('success');
Route::post('/customer/register','CustomerController@register')->name('customer.create');
Route::get('/customer/logout','CustomerController@logOut')->name('customer.logout');
Route::post('/customer/login','CustomerController@logIn')->name('customer.login');
Route::get('/{provider}/redirect','CustomerController@redirect')->name('oauth.redirect');
Route::get('/{provider}/callback','CustomerController@callback')->name('oauth.callback');
Route::post('/getquan','PageController@getQuan')->name('getquan');
Route::post('/getphuong','PageController@getPhuong')->name('getphuong');
Route::middleware('auth:customer')->prefix('/tai-khoan/')->name('account.')->group(function(){
Route::get('/','AccountController@index')->name('index');
Route::get('/chinh-sua','AccountController@edit')->name('edit');
Route::get('/doi-mat-khau','AccountController@editPassword')->name('edit_password');
Route::post('/doi-mat-khau','AccountController@updatePassword')->name('update_password');
Route::post('/cap-nhat','AccountController@update')->name('update');
Route::get('/them-dia-chi','AccountController@addAddress')->name('add_address');
Route::post('/them-dia-chi','AccountController@storeAddress')->name('store_address');
Route::post('/xoa-dia-chi/{id}','AccountController@deleteAddress')->name('delete_address');
Route::get('/sua-dia-chi/{id}','AccountController@editAddress')->name('edit_address');
Route::post('/sua-dia-chi/{id}','AccountController@updateAddress')->name('update_address');
Route::get('/dia-chi','AccountController@address')->name('address');
Route::get('/lich-su-don-hang','AccountController@orderHistory')->name('order_history');
Route::get('/chi-tiet-don-hang/{id}','AccountController@orderDetail')->name('order_detail');
});
Route::get('/{slug}','PostController@show')->name('post-detail');
});



