<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Repositories\Prd\CatInterface;
use App\Repositories\Prd\PrdInterface;
use App\Repositories\Prd\BrandInterface;

class BrandController extends Controller
{
    protected $cat;
    protected $prd;
    protected $brand;

    public function __construct (CatInterface $cat, PrdInterface $prd, BrandInterface $brand){
        $this->cat = $cat;
        $this->prd = $prd;
        $this->brand = $brand;
    }

    public function show($slug,Request $request){
    $brand = $this->brand->getFromSlug($slug);
    $prds = $this->prd->filter($request)->where('brand_id',$brand->id)->paginate(12);
    $cat=null;
    $brands = null;
    return view('front.all',compact('prds','brands','cat', 'brand'));
    }
}
