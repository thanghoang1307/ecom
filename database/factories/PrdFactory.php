<?php
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(\App\Models\Prd\Brand::class,function(Faker $faker){
return [
'name' => implode(' ',$faker->words(2)),
'slug' => implode('-',$faker->unique()->words(2)),
];
});

$factory->define(\App\Models\Prd\Prd::class,function(Faker $faker){
return [
'sku' => $faker->unique()->word,
'name' => $faker->sentence,
'brand_id' => null,
'slug' => implode('-',$faker->unique()->words(3)),
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