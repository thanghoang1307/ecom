<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Repositories\Prd\CatInterface;
use App\Repositories\Prd\PrdInterface;
use App\Repositories\Prd\BrandInterface;
use App\Repositories\Admin\BannerInterface;


class PageController extends Controller {
	protected $cat;
	protected $prd;
	protected $brand;
	protected $banner;
	

	public function __construct(CatInterface $cat, PrdInterface $prd, BrandInterface $brand, BannerInterface $banner){
		$this->cat = $cat;
		$this->prd = $prd;
		$this->brand = $brand;
		$this->banner = $banner;
	}

	public function index() {
	$cats = $this->cat->getAllData();
	$banners = $this->banner->getAllData();
	$brands = $this->brand->getAllData();
	return view('front.index',compact(['cats','brands','banners']));
	}

	public function cart(){
	return view('front.check-out-1');
	}

	public function payment(){
		return view('front.check-out-2');
	}

}