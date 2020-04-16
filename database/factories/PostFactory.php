<?php 
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(\App\Models\Admin\Post::class,function(Faker $faker){
$thumbs = [
'http://127.0.0.1:8000/assets/img/news/1.jpg',
'http://127.0.0.1:8000/assets/img/news/2.jpg',
'http://127.0.0.1:8000/assets/img/news/3.jpg',
'http://127.0.0.1:8000/assets/img/news/4.jpg',
'http://127.0.0.1:8000/assets/img/news/5.jpg',
'http://127.0.0.1:8000/assets/img/news/6.jpg',
'http://127.0.0.1:8000/assets/img/news/7.jpg',
'http://127.0.0.1:8000/assets/img/news/8.jpg',
];
return [
'title' => $faker->sentence,
'slug' => implode('-',$faker->words(3)),
'content' => $faker->paragraph,
'post_type' => $faker->randomElement(['post','page','video']),
'thumb' => $faker->randomElement($thumbs),
'view' => $faker->numberBetween($min = 1, $max = 300),
'is_show' => 1,
];
});