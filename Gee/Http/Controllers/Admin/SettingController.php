<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\SettingInterface;

class SettingController extends Controller
{   
    protected $setting;
    public function __construct(SettingInterface $setting){
    $this->setting = $setting;
    }

   public function index(){
    $settings = $this->setting->getAllData();
    return view('admin.setting.index',compact('settings'));
   }

   public function update(Request $request){
    $settings = $request->except('_token'); 
    $this->setting->updateSetting($settings);
    return redirect()->route('admin.setting.index');
   }
}
