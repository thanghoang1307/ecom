<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Order\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Repositories\Order\CustomerInterface;
use App\Http\Controllers\Controller as Controller;
use Socialite;
use Auth;

class CustomerController extends Controller
{	
	protected $customer;

	public function __construct(CustomerInterface $customer)
	{
		$this->customer = $customer;
	}

    public function register(Request $request)
    {	
        // Validate dữ liệu đăng ký
        $request->validate([
            'phone' => 'required|regex:/(0)[0-9]{9}/',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'name' => 'required',
            'password' => 'required|confirmed',
            'gender' => 'required',
            ]);
        // Validate trùng khớp email
        $customer = $this->customer->findByEmail($request->email);
        if($customer){
            return redirect()->back()->with('error','Email đã được đăng ký');
        }

        $password = Hash::make($request->password); // Hash mật khẩu
        
        // Tạo người dùng mới 
        $customer = $this->customer->create([
        	'name' => $request->name,
        	'password' => $password,
        	'gender' => $request->gender,
        	'phone' => $request->phone,
        	'email' => $request->email,]);
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // Đăng nhập sau khi đăng ký thành công
        Auth::guard('customer')->attempt($arr);
        return redirect()->back()->with('success','Đăng ký thành công');
    }

    // Redirect tới Google, Facebook
    public function redirect($provider){
    session()->put('last_url',url()->previous());
    return Socialite::driver($provider)->redirect();
    }

    // Callback nếu Oauth pass
    public function callback($provider){
    $getInfo = Socialite::driver($provider)->user();
    
    // Tạo người dùng mới
    $check = Customer::where('provider_id', $getInfo->id)->orWhere('email',$getInfo->email)->first();
    if (!$check) {
   $customer = $this->createUser($getInfo,$provider);
   Auth::guard('customer')->login($customer); 
   return redirect(Session::get('last_url'));
    } else {
        return redirect(Session::get('last_url'))->with('error','Trùng khớp email trong hệ thống');
    }
    }

    function createUser($getInfo,$provider){
       $customer = Customer::create([
         'name'     => $getInfo->name,
         'email'    => $getInfo->email,
         'provider' => $provider,
         'provider_id' => $getInfo->id,
     ]);  
   return $customer;
 }

    public function logOut(){
    Auth::guard('customer')->logout();
    return redirect()->route('front.index');
    }

    public function logIn(Request $request)
    {   
        $user = $this->customer->findByEmail($request->email);
        if(!$user) {
            return redirect()->back()->with('error','Người dùng không tồn tại hoặc chưa đăng ký');
        }

        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        

        if (Auth::guard('customer')->attempt($arr)) {
            return redirect()->back()->with('success','Đăng nhập thành công');
        } else {
            return redirect()->back()->with('error','Sai mật khẩu');
        }
    }
}