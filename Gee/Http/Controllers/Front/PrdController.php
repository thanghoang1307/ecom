<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Repositories\Prd\PrdInterface;
use Illuminate\Support\Facades\DB;

class PrdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $prd;

    public function __construct(PrdInterface $prd){
    $this->prd = $prd;
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
        return view('front.prd',compact(['prd']));
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
