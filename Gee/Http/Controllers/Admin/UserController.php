<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller as Controller;
use Auth;

class UserController extends Controller
{
    
    public function index(){
     $users = User::all();
     return view('admin.user.index',compact('users'));
    }

    public function create(Request $request){
    $password = Hash::make($request->new_password);
     $users = User::create(['name' => $request->name,'email' => $request->email,'password' => $password]);
     return redirect()->back();
    }

    public function delete($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.user.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.prd.index');
    }

}
