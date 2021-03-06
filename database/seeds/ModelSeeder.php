<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
    	[
    	'slug' => Str::random(2),
    	'name' => 'Hệ điều hành',
    	'icon' => 'nav-win',
        'short_name' => 'Windows',
        'slug' => 'he-dieu-hanh'
    	],
    	[
    	'slug' => Str::random(2),
    	'name' => 'Phần mềm văn phòng',
    	'icon' => 'nav-app',
        'short_name' => 'Văn phòng',
        'slug' => 'phan-mem-van-phong'
    	],
    	[
    	'slug' => Str::random(2),
    	'name' => 'Phần mềm bảo mật',
    	'icon' => 'nav-security',
        'short_name' => 'Bảo mật',
        'slug' => 'phan-mem-bao-mat'
    	],
    	[
    	'slug' => Str::random(2),
    	'name' => 'Thiết kế CAD/CAM/CAE',
    	'icon' => 'nav-cad',
        'short_name' => 'CAD/CAM',
        'slug' => 'thiet-ke-cad-cam-cae'
    	],
    	[
    	'slug' => Str::random(2),
    	'name' => 'Quản lý khách hàng/CRM',
    	'icon' => 'nav-crm',
        'short_name' => 'CRM',
        'slug' => 'phan-mem-crm'
    	],
    	[
    	'slug' => Str::random(2),
    	'name' => 'Máy trạm Workstation',
    	'icon' => 'nav-workstation',
        'short_name' => 'Workstation',
        'slug' => 'may-tram-workstation',
    	],
    	[
    	'slug' => Str::random(2),
    	'name' => 'Bộ lưu điện/UPS',
    	'icon' => 'nav-ups',
        'short_name' => 'UPS',
        'slug' => 'bo-luu-dien-ups'
    	],
    	[
    	'slug' => Str::random(2),
    	'name' => 'Máy in',
    	'icon' => 'nav-plotter',
        'short_name' => 'Máy in',
        'slug' => 'may-in'
    	],
    	];
    	DB::table('cats')->insert($data);
        $id = 1;
        foreach ($data as $row){
        DB::table('prd_cats')->insert(['prd_id' => $id,'cat_id' => $id
        ]);
        $id++;
        }
        $banners =[[
        'name' => 'Banner chính 1',
        'image' => 'http://127.0.0.1:8000/assets/img/header/banner/900x330-01.png'
        ],
        [
        'name' => 'Banner chính 2',
        'image' => 'http://127.0.0.1:8000/assets/img/header/banner/900x330-02.png'
        ],
        [
        'name' => 'Banner chính 3',
        'image' => 'http://127.0.0.1:8000/assets/img/header/banner/900x330-03.png'
        ],
        [
        'name' => 'Banner chính 4',
        'image' => 'http://127.0.0.1:8000/assets/img/header/banner/900x330-04.png'
        ],
        [
        'name' => 'Banner phụ 1',
        'image' => 'http://127.0.0.1:8000/assets/img/header/banner/300x120-01.png'
        ],
        [
        'name' => 'Banner phụ 2',
        'image' => 'http://127.0.0.1:8000/assets/img/header/banner/300x120-02.png'
        ],
        [
        'name' => 'Banner phụ 3',
        'image' => 'http://127.0.0.1:8000/assets/img/header/banner/300x120-03.png'
        ],
        [
        'name' => 'Banner Middle 1',
        'image' => 'http://127.0.0.1:8000/assets/img/header/item-banner.jpg'
        ],
        [
        'name' => 'Banner Middle 2',
        'image' => 'http://127.0.0.1:8000/assets/img/header/item-banner.jpg'
        ],
        [
        'name' => 'Banner Middle 3',
        'image' => 'http://127.0.0.1:8000/assets/img/header/item-banner.jpg'
        ],
        [
        'name' => 'Banner Middle 4',
        'image' => 'http://127.0.0.1:8000/assets/img/header/item-banner.jpg',
        ],
        [
        'name' => 'Top Banner',
        'image' => 'http://127.0.0.1:8000/assets/img/header/top-banner-subpage.jpg',
        ],
    ];
    DB::table('banners')->insert($banners);

    $settings = [
        [
            'key' => 'logo',
            'name' => 'Logo',
            'value' => 'http://127.0.0.1:8000/assets/img/logo.png',
        ],
        [
            'key' => 'phone',
            'name' => 'Điện thoại',
            'value' => '0837 000 247'
        ],
        [
            'key' => 'facebook',
            'name' => 'Facebook',
            'value' => '#'
        ],
        [
            'key' => 'youtube',
            'name' => 'Youtube',
            'value' => '#',
        ],
        [
            'key' => 'instagram',
            'name' => 'Instagram',
            'value' => '#',
        ],
        [
            'key' => 'email',
            'name' => 'Email',
            'value' => 'cskh@onestopshop.vn',
        ]
    ];

    DB::table('settings')->insert($settings);

    $post = factory(\App\Models\Admin\Post::class,10)->create();

    $pages = [
    ['title' => 'Chính sách đổi trả',
    'slug' => 'chinh-sach-doi-tra',
    'post_type' => 'page',
    ],
    ['title' => 'Chính sách bảo hành',
    'slug' => 'chinh-sach-bao-hanh',
    'post_type' => 'page',
    ],
    ['title' => 'Bảo mật thông tin',
    'slug' => 'bao-mat-thong-tin',
    'post_type' => 'page',
    ],
    ['title' => 'Thông tin liên hệ',
    'slug' => 'thong-tin-lien-he',
    'post_type' => 'page',
    ],
    ['title' => 'Hướng dẫn mua hàng',
    'slug' => 'huong-dan-mua-hang',
    'post_type' => 'page',
    ],
    ['title' => 'Hướng dẫn thanh toán',
    'slug' => 'huong-dan-thanh-toan',
    'post_type' => 'page',
    ],
    ['title' => 'Phương thức vận chuyển',
    'slug' => 'phuong-thuc-van-chuyen',
    'post_type' => 'page',
    ],
    ];

    DB::table('posts')->insert($pages);

    $user = [
    ['name' => 'admin',
    'email' => 'onestopshop@gmail.com',
    'password' => Hash::make('admin123456'),
    'role' => 0,]
    ];
    DB::table('users')->insert($user);

    $customer = [
        [
        'name' => 'Thang',
        'email' => 'thang.hoang1307@gmail.com',
        'password' => Hash::make('koolpro37'),
        'gender' => 'male',
        'phone' => '0933894980'],
    ];

    DB::table('customers')->insert($customer);

    $cities = file_get_contents(database_path() . '/mysql/cities.sql');
    DB::unprepared($cities);

    $districts = file_get_contents(database_path() . '/mysql/districts.sql');
    DB::unprepared($districts);

    $wards = file_get_contents(database_path() . '/mysql/wards.sql');
    DB::unprepared($wards);
    }
}
