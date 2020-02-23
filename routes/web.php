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

Auth::routes();

Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function() {
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
});

Route::name('front.')->namespace('Front')->group(function(){
Route::get('/','PageController@index')->name('index');
Route::get('/san-pham/{slug}','PrdController@show')->name('product-detail');
Route::get('/tin-tuc-cong-nghe','PostController@list')->name('post-list');
Route::get('/danh-muc/{slug}','CatController@show')->name('category-list');
Route::get('/thong-tin-dat-hang','PageController@checkOut1')->name('check_out_1');
Route::post('/add-to-cart/{id}','PrdController@addToCart')->name('add_to_cart');
Route::post('/buy-now/{id}','PrdController@buyNow')->name('buy_now');
Route::post('/view-more','PostController@viewMore')->name('view-more');
Route::get('/{slug}','PostController@show')->name('post-detail');
});

