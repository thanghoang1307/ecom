<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Repositories\Prd\PrdInterface;
use App\Repositories\Prd\AttrFamilyInterface;
use App\Repositories\Prd\AttrInterface;
use Illuminate\Support\Facades\DB;

class PrdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $prd;
    protected $attr_family;

    public function __construct(PrdInterface $prd, AttrFamilyInterface $attr_family, AttrInterface $attr){
    $this->prd = $prd;
    $this->attr_family = $attr_family;
    $this->attr= $attr;
    }

    public function show($slug)
    {   
        if (!session()->get('products.recently_viewed')){
        session()->put('products.recently_viewed',[]);
        }
        $prd = $this->prd->getFromSlug($slug);
        if (!in_array($prd->id,session()->get('products.recently_viewed'))){
        session()->push('products.recently_viewed', $prd->id);
        }
        // Chuẩn bị dữ liệu
        $attr_family = $this->attr_family->find($prd->attr_family_id);
        $attrs = $this->attr->find($attr_family->attr_gr_maps->pluck('attr_id'));
        return view('front.prd',compact(['prd','attrs']));
    }

    public function all(Request $request){
    $prds = $this->prd->filter($request)->paginate(12);
    $brands = null;
    $cat = null;
    return view('front.all',compact('prds','brands','cat'));
    }

    public function addToCart($id, Request $request){
    
    if (!session()->get('cart.items.'.$id)){
    session()->put('cart.items.'.$id,1);
    } else {
    $qty = session('cart.items.'.$id);
    $qty += 1;
    session()->put('cart.items.'.$id,$qty);
    }
    return redirect()->back();
    }

    public function buyNow($id, Request $request){
    if (!session()->get('cart.items.'.$id)){
    session()->put('cart.items.'.$id,1);
    } else {
    $qty = session('cart.items.'.$id);
    $qty += 1;
    session()->put('cart.items.'.$id,$qty);
    }
    return redirect()->route('front.check_out_1');
    }
}
