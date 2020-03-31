<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Repositories\Prd\CatInterface;
use App\Repositories\Prd\PrdInterface;
use App\Repositories\Prd\BrandInterface;

class CatController extends Controller
{
    protected $cat;
    protected $prd;
    protected $brand;

    public function __construct (CatInterface $cat, PrdInterface $prd, BrandInterface $brand){
        $this->cat = $cat;
        $this->prd = $prd;
        $this->brand = $brand;
    }

    public function show($slug, Request $request){
    $cat = $this->cat->getFromSlug($slug);
  	$brands_id = $this->cat->getBrandId($cat->id);
  	$brands = $this->brand->getBrandFromIds($brands_id);
    $prds = $this->cat->filter($request, $cat->id)->paginate(12);
    return view('front.cat',compact('cat','brands','prds'));
    }

    public function search(Request $request){
        if ($request->cat != "0"){
            return redirect('/danh-muc/'.$request->cat.'?search='.$request->search);
        } else {
        return redirect('/san-pham?search='.$request->search);  
        }
    }

    public function mobileOrder(Request $request)
    {
        dd($request->m_orderby);
    }

    public function mobileFilter()
    {
        
    }

}
