<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\Admin\BannerInterface;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    protected $banner;

    public function __construct(BannerInterface $banner){
    $this->banner = $banner;
    }

    public function index(){
     $banners = $this->banner->getAllData();
     return view('admin.banner.index',compact('banners'));
    }

    public function edit($id){
    $banner = $this->banner->find($id);
    return view('admin.banner.edit',compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $banner = $this->banner->update($id, $request->all());
        return redirect()->route('admin.banner.index');
    }

}
