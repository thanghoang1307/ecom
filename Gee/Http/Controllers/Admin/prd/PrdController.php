<?php

namespace App\Http\Controllers\Admin\Prd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Repositories\Prd\PrdInterface;
use App\Repositories\Prd\AttrGrInterface;
use App\Repositories\Prd\AttrInterface;
use App\Repositories\Prd\BrandInterface;
use App\Repositories\Prd\CatInterface;
use App\Repositories\Prd\PrdImageInterface;
use App\Repositories\Prd\AttrFamilyInterface;
use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Excel;

class PrdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $prd;
    protected $attr_gr;
    protected $brand;
    protected $attr;
    protected $cat;
    protected $prd_image;
    protected $attr_family;
    protected $excel;

    public function __construct(
        PrdInterface $prd,
        AttrGrInterface $attr_gr,
        BrandInterface $brand,
        AttrInterface $attr,
        CatInterface $cat,
        PrdImageInterface $prd_image,
        AttrFamilyInterface $attr_family,
        Excel $excel
    ) {
        $this->prd = $prd;
        $this->attr_gr = $attr_gr;
        $this->brand = $brand;
        $this->attr = $attr;
        $this->cat = $cat;
        $this->prd_image = $prd_image;
        $this->attr_family = $attr_family;
        $this->excel = $excel;
    }

    public function productsExport(Request $request)
    {
        return \Excel::download(new ProductsExport($this->prd), 'products.xlsx');
    }

    public function productsImport(Request $request)
    {
        \Excel::import(new ProductsImport($this->prd), $request->prd);
        return redirect()->back();
    }

    public function index(Request $request)
    {
        if (!$request->cat_id) {
            $prds = $this->prd->getAll();
        } else {
            $chosen_cat = $this->cat->find($request->cat_id);
            $prds = $chosen_cat->prds()->paginate(10);
        }
        $brands = $this->brand->getAllData();
        $attr_families = $this->attr_family->getAllData();
        $cats = $this->cat->getAllData();
        return view('admin.prd.index', compact(['prds', 'attr_families', 'brands', 'cats']));
    }



    public function create(StoreProduct $request)
    {
        $validated = $request->validated();
        // Chuẩn bị dữ liệu
        $attr_family = $this->attr_family->find($request->attr_family_id);
        $attr_grs = $attr_family->attr_grs()->orderBy('position', 'asc')->get();
        $unique_slug = $this->prd->createUniqueSlug(to_slug($request->name));

        // Tạo record trong bảng sản phẩm
        $prd = $this->prd->create(array_merge($request->all(), ['slug' => $unique_slug]));

        // Tạo record trong sản phẩm - thuộc tính
        $this->prd->addAttr($prd->id, $attr_family->attr_gr_maps->pluck('attr_id')->toArray());
        return redirect()->route('admin.prd.edit', $prd->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prd  $prd
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $brands = $this->brand->getAll();
        $prd = $this->prd->find($id);
        // $attrs_in = $this->prd->getAttrsIn($id);
        $attr_grs = $prd->attr_family->attr_grs;
        // $attrs_in_id = $this->prd->getAttrsInIdArray($id);
        // $attrs_not_in = $this->attr->getAttrNotIn($attrs_in_id);
        $cats = $this->cat->getAll();

        $image = implode(',', $this->prd_image->getInput($id));
        return view('admin.prd.edit', compact(['prd', 'brands', 'cats', 'image', 'attr_grs']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prd  $prd
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateProduct $request)
    {
        $validator = $request->validated();
        if ($request->sale_price) {
            $current_price = $request->sale_price;
        } else {
            $current_price = $request->regular_price;
        }
        $prd = $this->prd->update($id, array_merge($request->all(), ['current_price' => $current_price]));
        $this->prd->addCats($id, $request->categories);
        $this->prd->addAttrValue($id, $request->all());
        $this->prd_image->addImages($id, $request->images);
        $request->session()->flash('success', 'Cập nhật sản phẩm thành công');
        return redirect()->route('admin.prd.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prd  $prd
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $prd = $this->prd->delete($id);
        return redirect()->route('admin.prd.index');
    }

    public function addAttr($id, Request $request)
    {
        $this->prd->addAttr($id, array($request->attr_id));
        return redirect()->route('admin.prd.edit', $id);
    }

    public function delete_attr($attr_id, $prd_id)
    {
        $this->prd->deleteAttrFromPrd($attr_id, $prd_id);
        return redirect()->route('admin.prd.edit', $prd_id);
    }
}
