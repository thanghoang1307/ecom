<?php

use Illuminate\Database\Seeder;

class PrdTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand = factory(\App\Models\Prd\Brand::class,3)->create()->each(function($b){
        $b->prds()->saveMany(factory(\App\Models\Prd\Prd::class,3)->create([
        	'brand_id' => $b->id,
        ]));
        });

        $attr_gr = factory(\App\Models\Prd\AttrGr::class,3)->create();

        $attr = factory(\App\Models\Prd\Attr::class,5)->create();

        $cat = factory(\App\Models\Prd\Cat::class,5)->create();
    }
}
