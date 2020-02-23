<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Repositories\Prd\CatInterface;

class CatController extends Controller
{
    protected $cat;

    public function __construct (CatInterface $cat){
        $this->cat = $cat;
    }

    public function show($slug){
    $cat = $this->cat->getFromSlug($slug);
    return view('front.cat',compact('cat'));
    }
}
