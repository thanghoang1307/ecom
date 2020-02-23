<?php
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(\App\Models\Prd\Brand::class,function(Faker $faker){
$brands_logo = [
'http://127.0.0.1:8000/assets/img/parrtner/item1.jpg',
'http://127.0.0.1:8000/assets/img/parrtner/item2.jpg',
'http://127.0.0.1:8000/assets/img/parrtner/item3.jpg',
'http://127.0.0.1:8000/assets/img/parrtner/item4.jpg',
'http://127.0.0.1:8000/assets/img/parrtner/item5.jpg',
'http://127.0.0.1:8000/assets/img/parrtner/item6.jpg'];
return [
'name' => implode(' ',$faker->words(2)),
'slug' => implode('-',$faker->unique()->words(2)),
'logo' => $faker->randomElement($brands_logo),
];
});

$factory->define(\App\Models\Prd\Prd::class,function(Faker $faker){
$prds_thumb = [
'http://127.0.0.1:8000/assets/img/product/item/1.jpg',
'http://127.0.0.1:8000/assets/img/product/item/2.jpg',
'http://127.0.0.1:8000/assets/img/product/item/3.jpg',
'http://127.0.0.1:8000/assets/img/product/item/4.jpg',
'http://127.0.0.1:8000/assets/img/product/item/5.jpg',
'http://127.0.0.1:8000/assets/img/product/item/6.jpg',
'http://127.0.0.1:8000/assets/img/product/item/7.jpg',
'http://127.0.0.1:8000/assets/img/product/item/8.jpg',
'http://127.0.0.1:8000/assets/img/product/item/9.jpg',
'http://127.0.0.1:8000/assets/img/product/item/11.jpg'
];
return [
'sku' => $faker->unique()->word,
'name' => $faker->sentence,
'brand_id' => null,
'slug' => implode('-',$faker->unique()->words(3)),
'thumb' => $faker->randomElement($prds_thumb),
'regular_price' => 4290000,
'sale_price' => $faker->randomElement([null,3290000]),
];
});

$factory->define(\App\Models\Prd\AttrGr::class,function(Faker $faker){
return [
'name' => $faker->sentence,
];
});

$factory->define(\App\Models\Prd\Cat::class,function(Faker $faker){
return [
'slug' => implode('-',$faker->unique()->words(2)),
'name' => $faker->sentence,
];
});

$factory->define(\App\Models\Prd\Attr::class,function(Faker $faker){
return [
'code' => $faker->unique()->word,
'name' => $faker->sentence,
'type' => $faker->randomElement($array = array ('text','boolean','datetime','date','int','float')),
'is_required' => $faker->numberBetween($min = 0, $max = 1),
'is_looped' => $faker->numberBetween($min = 0, $max = 1),
];
});