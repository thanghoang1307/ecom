<?php

namespace App\Imports;

use App\Models\Prd\Prd;
use App\Models\Prd\Brand;
use App\Models\Prd\AttrFamily;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Repositories\Prd\PrdInterface;

class ProductsImport implements ToModel
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

    public function model(array $row)
    {
        $brand = Brand::where('name', $row[3])->first();
        $attr_family = AttrFamily::where('name', $row[4])->first();

        if (!$brand) {
            $new_brand = Brand::create([
                'name' => $row[3],
                'slug' => to_slug($row[3]),
            ]);
            $row[3] = $new_brand->id;
        } else {
            $row[3] = $brand->id;
        }

        if (!$attr_family) {
            $new_attr_family = AttrFamily::create([
                'name' => $row[4],
                'code' => to_slug($row[4]),
            ]);
            $row[4] = $new_attr_family->id;
        } else {
            $row[4] = $attr_family->id;
        }

        if (!$row[6]) {
            $current_price = $row[5];
        } else {
            $current_price = $row[6];
        }

        $unique_slug = $this->prd->createUniqueSlug(to_slug($row[2]));

        return new Prd([
            'sku' => $row[1],
            'slug' => $unique_slug,
            'name' => $row[2],
            'brand_id' => $row[3],
            'attr_family_id' => $row[4],
            'regular_price' => $row[5],
            'sale_price' => $row[6],
            'thumb' => $row[7],
            'current_price' => $current_price,
        ]);
    }
}
