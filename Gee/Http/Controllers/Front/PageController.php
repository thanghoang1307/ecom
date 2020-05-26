<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller as Controller;
use App\Repositories\Admin\BannerInterface;
use App\Repositories\Prd\BrandInterface;
use App\Repositories\Prd\CatInterface;
use App\Repositories\Prd\PrdInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    protected $cat;
    protected $prd;
    protected $brand;
    protected $banner;

    public function __construct(CatInterface $cat, PrdInterface $prd, BrandInterface $brand, BannerInterface $banner)
    {
        $this->cat = $cat;
        $this->prd = $prd;
        $this->brand = $brand;
        $this->banner = $banner;
    }
    public function getQuan(Request $request)
    {
        $items = DB::table('districts')->where('matp', $request->matp)->get();
        return response()->json(['html' => view('includes.quan', compact('items'))->render()]);
    }

    public function getPhuong(Request $request)
    {
        $items = DB::table('wards')->where('maqh', $request->maqh)->get();
        return response()->json(['html' => view('includes.phuong', compact('items'))->render()]);
    }

    public function index()
    {
        $cats = $this->cat->getAllData();
        $banners = $this->banner->getAllData();
        $brands = $this->brand->getAllData();
        return view('front.index', compact(['cats', 'brands', 'banners']));
    }

    public function cart()
    {
        return view('front.check-out-1');
    }

    public function payment($order_number)
    {
        return view('front.check-out-2', compact('order_number'));
    }

    public function subscribe(Request $request)
    {
        //Validate input
        $validatedData = $request->validate([
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|unique:subscribers',
        ]);

        $subscriber = DB::table('subscribers')->insert([
            'email' => $request->email,
        ]);

        return redirect()->back()->with(['success' => 'Đăng ký nhận bản tin thành công']);
    }

}
