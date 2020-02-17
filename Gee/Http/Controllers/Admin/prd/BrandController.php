<?php

namespace App\Http\Controllers\Admin\Prd;

use App\Brand;
use Illuminate\Http\Request;
use App\Repositories\Prd\BrandInterface;
use App\Http\Controllers\Controller as Controller;

class BrandController extends Controller
{
    protected $brand;

    public function __construct (BrandInterface $brand){
        $this->brand = $brand;
    }

    public function index()
    {   $brands = $this->brand->getAll();
        return view('admin.brand.index',compact('brands'));
    }

    public function create(Request $request)
    {
        $brand = $this->brand->create($request->all());
        return redirect()->route('admin.brand.edit',$brand->id);
    }

    public function edit($id)
    {
        $brand = $this->brand->find($id);
        return view('admin.brand.edit',compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $brand = $this->brand->update($id, $request->all());
        return redirect()->route('admin.brand.index');
    }

    public function delete($id)
    {
     $brand = $this->brand->delete($id);
    return redirect()->route('admin.brand.index');
    }
}
