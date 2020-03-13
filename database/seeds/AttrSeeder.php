<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AttrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $attr_families = [
        [
            'code' => 'default',
            'name' => 'Mặc định',
            'is_user_defined' => 1,
        ],
    ];

    DB::table('attr_families')->insert($attr_families);

    $attr_grs = [
    	[
    	'name' => 'SEO',
    	'position' => 1,
    	'is_user_defined' => 1,
    	'attr_family_id' => 1,
    	],
    ];
    DB::table('attr_grs')->insert($attr_grs);

    $attrs = [
    [
    	'code' => 'meta_description',
    	'name' => 'Meta Description',
    	'type' => 'textarea',
    	'position' => 1,
    	'is_required' => 0,
    	'is_looped' => 0,
    	'is_unique' => 0,
    	'is_user_defined' => 0,
    ],
    [
    	'code' => 'meta_title',
    	'name' => 'Meta Title',
    	'type' => 'text',
    	'position' => 2,
    	'is_required' => 1,
    	'is_looped' => 1,
    	'is_unique' => 1,
    	'is_user_defined' => 1,
    ],
    ];
    DB::table('attrs')->insert($attrs);
    $attr_gr_mappings = [[
    'attr_gr_id' => 1,
    'attr_id' => 1,
    ],
[
   'attr_gr_id' => 1,
    'attr_id' => 2,
],];

    DB::table('attr_gr_mappings')->insert($attr_gr_mappings);
    }
}
