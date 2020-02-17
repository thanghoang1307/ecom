<?php
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(\App\Models\Prd\AttrGr::class,function(Faker $faker){
return [
'name' => implode(' ',$faker->words(2)),
];
});

$factory->define(\App\Models\Prd\Prd::class,function(Faker $faker){
return [
'sku' => Str::random(5),
'name' => $faker->sentence,
'attr_gr_id' => null,
'slug' => implode('-',$faker->words(3)),
];
});