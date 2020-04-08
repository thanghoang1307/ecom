<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Order\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Repositories\Order\CustomerInterface;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Mail;
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

    public function redirect($provider){
    session()->put('last_url',url()->previous());
    return Socialite::driver($provider)->redirect();
    }

    public function callback($provider){
    $getInfo = Socialite::driver($provider)->user();
    
    /* Nếu tài khoản đã được tạo bằng email
    => Báo lỗi
    /* Nếu tài khoản chưa được tạo bằng social
    => Tạo mới
    /* Nếu tài khoản đã được tạo bằng social
    => Đăng nhập
    */
    $customerRegisterBySocial = Customer::where('provider_id', $getInfo->id)->first();
    $customerRegisterByEmail = Customer::where('email',$getInfo->email)->where('provider_id',null)->first();
    if($customerRegisterByEmail){
        return redirect(Session::get('last_url'))->with('error','Trùng khớp email trong hệ thống');
    } else if (!$customerRegisterBySocial){
        $customerRegisterBySocial = $this->createUser($getInfo,$provider);
        Auth::guard('customer')->login($customerRegisterBySocial); 
        return redirect(Session::get('last_url'))->with('success','Tạo tài khoản thành công');
    } else {
        Auth::guard('customer')->login($customerRegisterBySocial);
        return redirect(Session::get('last_url'))->with('success','Đăng nhập thành công');
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

    public function validatePasswordRequest(Request $request) {
        // Kiểm tra email có tồn tại
$customer = DB::table('customers')->where('email', '=', $request->email)
->first();
if (count($customer) < 1) {
return redirect()->back()->withErrors(['email' => 'Không tồn tại người dùng với email này']);
}

// Create Password Reset Token
DB::table('password_resets')->insert([
'email' => $request->email,
'token' => str_random(60),
'created_at' => Carbon::now()
]);
//Get the token just created above
$tokenData = DB::table('password_resets')
->where('email', $request->email)->first();

if ($this->sendResetEmail($request->email, $tokenData->token)) {
return redirect()->back()->with('success', 'Email tạo lại mật khẩu đã được gửi. Vui lòng kiểm tra hộp thư của bạn');
} else {
return redirect()->back()->withErrors(['error' => 'Đã có lỗi xảy ra']);
}
    }

    private function sendResetEmail($email, $token)
{
//Retrieve the user from the database
$customer = Customer::where('email', $email)->first();
//Generate, the password reset link. The token generated is embedded in the link
$link = config('base_url') . 'password/reset/' . $token . '?email=' . urlencode($customer->email);

    try {
    //Here send the link with CURL with an external email API
        Mail::to($customer)->send(new ResetPassword($link,$customer));
        return true;
    } catch (\Exception $e) {
        return false;
    }
}
}