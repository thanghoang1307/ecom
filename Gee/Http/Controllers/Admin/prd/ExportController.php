<?php

namespace App\Http\Controllers\Admin\Prd;

use App\Exports\ProductsExport;
use Maatwebsite\Excel\Excel;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;

class ExportController extends Controller
{
  private $excel;

  public function __contruct(Excel $excel)
  {
    $this->excel = $excel;
  }

  public function productsExport(Request $request)
  {
    $this->excel->download(new ProductsExport, 'products.xlxs');
  }
}
