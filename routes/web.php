<?php
// Auth Route
Auth::routes();

/*
 * Admin Route
 * Các route cho admin
 */
Route::prefix('admin')->name('admin.')->namespace('Admin')->middleware('auth')->group(function () {

    // Route '/admin'
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::post('/chart-data', 'DashboardController@getChartData')->name('dashboard.chart_data');
    Route::post('/top-prds', 'DashboardController@getTopPrds')->name('dashboard.top_prds');

    // Group người dùng
    Route::prefix('nguoi-dung')->name('user.')->group(function () {
        Route::get('/', 'UserController@index')->name('index');
        Route::post('/create', 'UserController@create')->name('create');
        Route::post('/delete/{id}', 'UserController@delete')->name('delete');
        Route::get('/logout', 'UserController@logout')->name('logout');
    });

    Route::namespace('Prd')->group(function () {
        // Group sản phẩm
        Route::prefix('san-pham')->name('prd.')->group(function () {
            Route::get('/', 'PrdController@index')->name('index');
            Route::post('/', 'PrdController@create');
            Route::post('update/{id}', 'PrdController@update')->name('update');
            Route::get('/edit/{id}', 'PrdController@edit')->name('edit');
            Route::get('/delete/{id}', 'PrdController@delete')->name('delete');
            Route::post('/add_attr/{id}', 'PrdController@addAttr');
            Route::get('/delete_attr/{attr_id}/{prd_id}', 'PrdController@delete_attr')->name('delete_attr');
            Route::get('/export', 'PrdController@productsExport')->name('export');
            Route::post('/import', 'PrdController@productsImport')->name('import');
            Route::get('/tai-mau', function () {
                $path = storage_path('products.xlsx');
                return response()->download($path);
            })->name('download_template');
        });
        //Kết thức sản phẩm

        // Group danh mục
        Route::prefix('danh-muc')->name('cat.')->group(function () {
            Route::get('/', 'CatController@index')->name('index');
            Route::post('/', 'CatController@create');
            Route::get('/edit/{id}', 'CatController@edit')->name('edit');
            Route::post('/update/{id}', 'CatController@update')->name('update');
            Route::get('/delete/{id}', 'CatController@delete')->name('delete');
        });
        //Kết thức group danh mục

        // Group nhóm thuộc tính
        Route::prefix('nhom-thuoc-tinh')->name('attr_gr.')->group(function () {
            Route::get('/', 'AttrGrController@index')->name('index');
            Route::post('/', 'AttrGrController@create');
            Route::get('/edit/{id}', 'AttrGrController@edit')->name('edit');
            Route::post('/update/{id}', 'AttrGrController@update')->name('update');
            Route::get('/delete/{id}', 'AttrGrController@delete')->name('delete');
            Route::post('/add_attr/{id}', 'AttrGrController@addAttr');
            Route::get('/delete_attr/{attr_id}/{attr_gr_id}', 'AttrGrController@delete_attr')->name('delete_attr');
        });
        //Kết thúc group nhóm thuộc tính

        // Group thuộc tính
        Route::prefix('thuoc-tinh')->name('attr.')->group(function () {
            Route::get('/', 'AttrController@index')->name('index');
            Route::post('/', 'AttrController@create');
            Route::get('/edit/{id}', 'AttrController@edit')->name('edit');
            Route::post('/update/{id}', 'AttrController@update')->name('update');
            Route::get('/delete/{id}', 'AttrController@delete')->name('delete');
        });
        //Kết thúc group thuộc tính

        // Group thuộc tính
        Route::prefix('thuong-hieu')->name('brand.')->group(function () {
            Route::get('/', 'BrandController@index')->name('index');
            Route::post('/', 'BrandController@create');
            Route::get('/edit/{id}', 'BrandController@edit')->name('edit');
            Route::post('/update/{id}', 'BrandController@update')->name('update');
            Route::get('/delete/{id}', 'BrandController@delete')->name('delete');
        });
        //Kết thúc group thuộc tính

        // Nhóm sản phẩm
        Route::prefix('nhom-san-pham')->name('attr_family.')->group(function () {
            Route::get('/', 'AttrFamilyController@index')->name('index');
            Route::post('/', 'AttrFamilyController@create')->name('create');
            Route::post('/them-thuoc-tinh-vao-nhom', 'AttrFamilyController@addAttr')->name('add_attr');
            Route::post('/tao-nhom-thuoc-tinh', 'AttrFamilyController@createAttrGr')->name('create_attr_gr');
            Route::get('/edit/{id}', 'AttrFamilyController@edit')->name('edit');
            Route::post('/xoa-nhom-thuoc-tinh/{attr_gr_id}', 'AttrFamilyController@deleteAttrGr')->name('delete_attr_gr');
            Route::post('/xoa-thuoc-tinh/{attr_id}', 'AttrFamilyController@deleteAttr')->name('delete_attr');
            Route::post('/update/{id}', 'AttrFamilyController@update')->name('update');
            Route::get('/delete/{id}', 'AttrFamilyController@delete')->name('delete');
        });
        // End nhóm sản phẩm
        // Kết thúc namespace Prd

    });

    // Banner
    Route::prefix('banner')->name('banner.')->group(function () {
        Route::get('/', 'BannerController@index')->name('index');
        Route::get('/vi-tri-banner/edit/{position_id}', 'BannerController@editPosition')->name('position_edit');
        Route::post('/', 'BannerController@create')->name('create');
        Route::get('/edit/{id}', 'BannerController@edit')->name('edit');
        Route::post('/update/{id}', 'BannerController@update')->name('update');
        Route::get('/delete/{id}', 'BannerController@delete')->name('delete');
    });
    // End Banner

    // post
    Route::prefix('bai-viet')->name('post.')->group(function () {
        Route::get('/', 'PostController@index')->name('index');
        Route::post('/', 'PostController@create')->name('create');
        Route::get('/edit/{slug}', 'PostController@edit')->name('edit');
        Route::post('/update/{slug}', 'PostController@update')->name('update');
        Route::get('/delete/{slug}', 'PostController@delete')->name('delete');
    });
    // End post

    // setting
    Route::prefix('cai-dat')->name('setting.')->group(function () {
        Route::get('/', 'SettingController@index')->name('index');
        Route::post('/update', 'SettingController@update')->name('update');
    });
    // End setting

    // Order
    Route::namespace('Order')->group(function () {
        Route::prefix('don-hang')->name('order.')->group(function () {
            Route::get('/', 'OrderController@index')->name('index');
            Route::get('/edit/{order_number}', 'OrderController@edit')->name('edit');
            Route::post('/update/{order_number}', 'OrderController@update')->name('update');
            Route::get('export', 'OrderController@export')->name('export');
        });
        // End order

        // Customer
        Route::prefix('khach-hang')->name('customer.')->group(function () {
            Route::get('/', 'CustomerController@index')->name('index');
            Route::get('/show/{type}/{id}', 'CustomerController@show')->name('show');
        });
        // End customer
    });
    // Subscriber
    Route::get('/subscribers', 'SubscriberController@index')->name('subscriber.index');
});

/*
 ** Front Route
 */

Route::name('front.')->namespace('Front')->group(function () {
    Route::get('/', 'PageController@index')->name('index');

    // Subcribe email
    Route::post('/subscribe', 'PageController@subscribe')->name('subscribe');

    // Show sản phẩm
    Route::get('/san-pham/{slug}', 'PrdController@show')->name('product-detail');

    // List tất cả sản phẩm
    Route::get('/san-pham/', 'PrdController@all')->name('product-list');

    // List tin tức
    Route::get('/tin-tuc-cong-nghe', 'PostController@list')->name('post-list');

    // List sản phẩm
    Route::post('/search', 'CatController@search')->name('search');
    Route::get('/danh-muc/{slug}', 'CatController@show')->name('category-list');
    Route::get('/thuong-hieu/{slug}', 'BrandController@show')->name('brand-list');
    Route::post('/cat-filter', 'CatController@filter')->name('prd_filter');

    // Thanh toán
    Route::get('/thong-tin-dat-hang', 'PageController@cart')->name('check_out_1');
    Route::get('/thanh-toan/{order_number}', 'PageController@payment')->name('thanh_toan');
    Route::post('/add-to-cart/{id}', 'PrdController@addToCart')->name('add_to_cart');
    Route::post('/buy-now/{id}', 'PrdController@buyNow')->name('buy_now');
    Route::post('/view-more', 'PostController@viewMore')->name('view-more');
    Route::post('/ajax-update-cart', 'CartController@ajaxUpdateCart')->name('ajax_update_cart');
    Route::post('/ajax-remove-item', 'CartController@ajaxRemoveItem')->name('ajax_remove_item');
    Route::post('/checkout2', 'CartController@checkOut2')->name('check_out_2');
    Route::post('/checkout3/{order_number}', 'CartController@checkOut3')->name('check_out_3');
    Route::get('/hoan-tat-don-hang/{order_number}', 'CartController@success')->name('success');
    Route::get('/tai-bao-gia/', 'CartController@taiBaoGia')->name('tai_bao_gia');

    // Đăng ký tài khoản
    Route::post('/customer/register', 'CustomerController@register')->name('customer.create');
    Route::get('/customer/logout', 'CustomerController@logOut')->name('customer.logout');
    Route::post('/customer/login', 'CustomerController@logIn')->name('customer.login');
    Route::get('/{provider}/redirect', 'CustomerController@redirect')->name('oauth.redirect');
    Route::get('/{provider}/callback', 'CustomerController@callback')->name('oauth.callback');
    Route::post('/register-by-social', 'CustomerController@createCustomerBySocial')->name('customer.create_by_social');
    Route::post('/getquan', 'PageController@getQuan')->name('getquan');
    Route::post('/getphuong', 'PageController@getPhuong')->name('getphuong');

    // Quên mật khẩu
    Route::get('/quen-mat-khau', function () {
        return view('front.profile-forgot-password');
    })->name('customer.forget_password_page');

    Route::post('/validate_password', 'CustomerController@validatePasswordRequest')->name('customer.forget_password');
    Route::get('/cai-lai-mat-khau/{token}', function ($token) {
        return view('front.profile-reset-password')->with([
            'token' => $token,
            'email' => urldecode($_GET['email']),
        ]);
    });
    Route::post('/reset_password', 'CustomerController@resetPassword')->name('customer.reset_password');

    // Account
    Route::middleware('auth:customer')->prefix('/tai-khoan/')->name('account.')->group(function () {
        Route::get('/', 'AccountController@index')->name('index');
        Route::get('/chinh-sua', 'AccountController@edit')->name('edit');
        Route::get('/doi-mat-khau', 'AccountController@editPassword')->name('edit_password');
        Route::post('/doi-mat-khau', 'AccountController@updatePassword')->name('update_password');
        Route::post('/cap-nhat', 'AccountController@update')->name('update');
        Route::get('/them-dia-chi', 'AccountController@addAddress')->name('add_address');
        Route::post('/them-dia-chi', 'AccountController@storeAddress')->name('store_address');
        Route::post('/xoa-dia-chi/{id}', 'AccountController@deleteAddress')->name('delete_address');
        Route::get('/sua-dia-chi/{id}', 'AccountController@editAddress')->name('edit_address');
        Route::post('/sua-dia-chi/{id}', 'AccountController@updateAddress')->name('update_address');
        Route::get('/dia-chi', 'AccountController@address')->name('address');
        Route::get('/lich-su-don-hang', 'AccountController@orderHistory')->name('order_history');
        Route::get('/chi-tiet-don-hang/{id}', 'AccountController@orderDetail')->name('order_detail');
    });
    Route::get('/{slug}', 'PostController@show')->name('post-detail');
});
