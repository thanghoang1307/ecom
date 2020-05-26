<?php

namespace App\Exports;

use App\Models\Prd\Prd;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Repositories\Prd\PrdInterface;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, Withmapping, WithHeadings
{
  protected $prd;

  public function __construct(PrdInterface $prd)
  {
    $this->prd = $prd;
  }

  public function headings(): array
  {
    return [
      '#',
      'sku',
      'name',
      'brand',
      'group',
      'regular_price',
      'sale_price',
      'thumb',
      'is_show',
      'tags'
    ];
  }

  public function map($prd): array
  {
    $status = $prd->is_show == 1? "Hiện" : "Ẩn";
    $tags = implode(',',$prd->tags()->pluck('name')->toArray());
    return [
      $prd->id,
      $prd->sku,
      $prd->name,
      $prd->brand->name,
      $prd->attr_family->name,
      $prd->regular_price,
      $prd->sale_price,
      $prd->thumb,
      $status,
      $tags,
    ];
  }

  public function collection()
  {
    return Prd::with('brand', 'attr_family')->get();
  }
}
