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
use Illuminate\Support\Facades\DB;

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

    public function __construct(PrdInterface $prd, AttrGrInterface $attr_gr, BrandInterface $brand, AttrInterface $attr, CatInterface $cat, PrdImageInterface $prd_image ){
    $this->prd = $prd;
    $this->attr_gr = $attr_gr;
    $this->brand = $brand;
    $this->attr = $attr;
    $this->cat = $cat;
    $this->prd_image = $prd_image;
    }

    public function index()
    {   $prds = $this->prd->getAll();
        $brands = $this->brand->getAll();
        $attr_grs = $this->attr_gr->getAll();
        return view('admin.prd.index',compact(['prds','attr_grs','brands']));
    }

    public function create(Request $request)
    {   
        // Chuẩn bị dữ liệu
        $attrs_in_id = $this->attr_gr->getAttrsInIdArray($request->attr_gr_id);
        $unique_slug = $this->prd->createUniqueSlug(to_slug($request->name));

        // Tạo record trong bảng sản phẩm
        $prd = $this->prd->create(array_merge($request->all(),['slug' => $unique_slug]));

        // Tạo record trong sản phẩm - thuộc tính
        $this->prd->addAttr($prd->id,$attrs_in_id);
        return redirect()->route('admin.prd.edit',$prd->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prd  $prd
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {   $brands = $this->brand->getAll();
        $attrs_in = $this->prd->getAttrsIn($id);
        $attrs_in_id = $this->prd->getAttrsInIdArray($id);
        $attrs_not_in = $this->attr->getAttrNotIn($attrs_in_id);
        $cats = $this->cat->getAll();
        $prd = $this->prd->find($id);
        $image = implode(',',$this->prd_image->getInput($id));
        return view('admin.prd.edit',compact(['prd','brands','attrs_in','attrs_not_in','cats','image']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prd  $prd
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {   if ($request->sale_price){
        $current_price = $request->sale_price;
        } else {
        $current_price = $request->regular_price;
        }
        $prd = $this->prd->update($id,array_merge($request->all(),['current_price' => $current_price]));
        $this->prd->addCats($id,$request->categories);
        $this->prd->addAttrValue($id,$request->all());
        $this->prd_image->addImages($id,$request->images);
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

    public function addAttr($id, Request $request){
    $this->prd->addAttr($id,array($request->attr_id));
    return redirect()->route('admin.prd.edit',$id);
    }

    public function delete_attr($attr_id, $prd_id){
    $this->prd->deleteAttrFromPrd($attr_id, $prd_id);
    return redirect()->route('admin.prd.edit',$prd_id);
    }
}
