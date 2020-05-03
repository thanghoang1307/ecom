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
      'Mã sản phẩm',
      'Tên sản phấm',
      'Thương hiệu',
      'Nhóm sản phẩm',
      'Giá thường',
      'Giá khuyến mãi',
      'Ảnh đại diện',
    ];
  }

  public function map($prd): array
  {
    return [
      $prd->id,
      $prd->sku,
      $prd->name,
      $prd->brand->name,
      $prd->attr_family->name,
      $prd->regular_price,
      $prd->sale_price,
      $prd->thumb,
    ];
  }

  public function collection()
  {
    return Prd::with('brand', 'attr_family')->get();
  }
}
