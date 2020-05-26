<?php

namespace App\Imports;

use App\Models\Prd\Prd;
use App\Models\Prd\Tag;
use App\Models\Prd\Brand;
use App\Models\Prd\AttrFamily;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Repositories\Prd\PrdInterface;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductsImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    protected $prd;

    public function __construct(PrdInterface $prd)
    {
        $this->prd = $prd;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
        $brand = Brand::where('name', $row['brand'])->first();
        $attr_family = AttrFamily::where('name', $row['group'])->first();

        if (!$brand) {
            $new_brand = Brand::create([
                'name' => $row['brand'],
                'slug' => to_slug($row['brand']),
            ]);
            $row['brand'] = $new_brand->id;
        } else {
            $row['brand'] = $brand->id;
        }

        if (!$attr_family) {
            $new_attr_family = AttrFamily::create([
                'name' => $row['group'],
                'code' => to_slug($row['group']),
            ]);
            $row['group'] = $new_attr_family->id;
        } else {
            $row['group'] = $attr_family->id;
        }

        if (!$row['sale_price']) {
            $current_price = $row['regular_price'];
        } else {
            $current_price = $row['sale_price'];
        }

        $unique_slug = $this->prd->createUniqueSlug(to_slug($row['name']));
        $is_show = $row['is_show'] == "Hiện" ? 1 : 0;
        
        $prd = Prd::updateOrCreate(
            ['sku' => $row['sku'],],
            ['slug' => $unique_slug,
            'name' => $row['name'],
            'brand_id' => $row['brand'],
            'attr_family_id' => $row['group'],
            'regular_price' => $row['regular_price'],
            'sale_price' => $row['sale_price'],
            'thumb' => $row['thumb'],
            'current_price' => $current_price,
            'is_show' => $is_show,
            ]);

            if($row['tags']) {
                $tags = explode(',',$row['tags']);
                $tag_ids = array();
                foreach ($tags as $tag) {
                    $firstOrCreateTag = Tag::firstOrCreate(['name' => $tag]);
                    $tag_ids[] = $firstOrCreateTag->id;
                }
                $prd->tags()->sync($tag_ids);
                } else {
                $prd->tags()->sync([]);
                }

    }
    }
}
