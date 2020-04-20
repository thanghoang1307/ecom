<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\Admin\BannerInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    protected $banner;

    public function __construct(BannerInterface $banner){
    $this->banner = $banner;
    }

    public function index(){
    //  $banners = $this->banner->getAllData();
    $banner_positions = DB::table('banner_positions')->get();
     return view('admin.banner.index',compact('banner_positions'));
    }

    public function editPosition($position_id) {
        if (in_array($position_id,[1,5,6,7])) {
        $banners = DB::table('banners')->where('position_id',$position_id)->get();
    return view('admin.banner.position_edit',compact('banners','position_id'));}
    else {
        $banner = DB::table('banners')->where('position_id',$position_id)->first();
        return redirect()->route('admin.banner.edit',$banner->id);
    }
    }

    public function create(Request $request) {
        $banner = DB::table('banners')->insertGetId([
            'name' => $request->name,
            'position_id' => $request->position_id,
        ]);
        return redirect()->route('admin.banner.edit',$banner);
    }

    public function edit($id){
    $banner = $this->banner->find($id);
    return view('admin.banner.edit',compact('banner'));
    }

    public function update(Request $request, $id)
    {   
        $request->validate([
            'image' => 'required',
        ]);
        $banner = $this->banner->update($id, $request->all());
        return redirect()->route('admin.banner.index');
    }

    public function delete($id){
        DB::table('banners')->where('id',$id)->delete();
        return redirect()->back();
    }

}
