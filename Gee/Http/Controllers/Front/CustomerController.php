<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Order\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Repositories\Order\CustomerInterface;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Mail\ResetPassword;
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
        // $request->validate([
        //     'phone' => 'required|regex:/(0)[0-9]{9}/',
        //     'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
        //     'name' => 'required',
        //     'password' => 'required|confirmed',
        //     'gender' => 'required',
        //     ]);
        
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
        return redirect()->back()->with('success','Tài khoản đã đăng ký thành công');
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
        return redirect(Session::get('last_url'))->with('error','Email này đã được sử dụng');
    } else if (!$customerRegisterBySocial){
        return view('front.profile-complete-register')->with([
            'name' => $getInfo->name,
            'email' => $getInfo->email,
            'provider' => $provider,
            'id' => $getInfo->id,
        ]);      
    } else {
        Auth::guard('customer')->login($customerRegisterBySocial);
        return redirect(Session::get('last_url'))->with('success','Đăng nhập thành công');
    }
    }

    
    public function createCustomerBySocial(Request $request){
        $customer =  Customer::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'provider' => $request->provider,
            'provider_id' => $request->id,
            'gender' => $request->gender,
            'phone' => $request->phone,
        ]); 
        Auth::guard('customer')->login($customer); 
        return redirect(Session::get('last_url'))->with('success','Tạo tài khoản thành công');
    }

    public function logOut(){
    
    Auth::guard('customer')->logout();
    session()->flush();
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
if (!$customer) {
return redirect()->back()->with(['email' => 'Không tồn tại người dùng với email này']);
}

// Create Password Reset Token
DB::table('password_resets')->insert([
'email' => $request->email,
'token' => Str::random(60),
'created_at' => Carbon::now()
]);
//Get the token just created above
$tokenData = DB::table('password_resets')
->where('email', $request->email)->first();

if ($this->sendResetEmail($request->email, $tokenData->token)) {
return redirect()->back()->with('success', 'Email tạo lại mật khẩu đã được gửi. Vui lòng kiểm tra hộp thư của bạn');
} else {
    return redirect()->back()->with(['error' => 'Đã có lỗi xảy ra']);
}
    }

    private function sendResetEmail($email, $token)
{
//Retrieve the user from the database
$customer = Customer::where('email', $email)->first();
//Generate, the password reset link. The token generated is embedded in the link
$link = url('/') . '/cai-lai-mat-khau/' . $token . '?email=' . urlencode($customer->email);
    try {
    //Here send the link with CURL with an external email API
        Mail::to($customer->email)->send(new ResetPassword($link,$customer));
        return true;
    } catch (\Exception $e) {
        return false;
    }
}

public function resetPassword(Request $request)
{
    //Validate input
    $validatedData = $request->validate([
        'password' => 'required',
    ]);

    $password = $request->password;
// Validate the token
    $tokenData = DB::table('password_resets')
    ->where('token', $request->token)->first();
// Redirect the user back to the password reset request form if the token is invalid
    if (!$tokenData) return view('front.profile-forgot-password')->with('error','Link thiết lập mật khẩu đã hết hạn');

    $customer = Customer::where('email', $tokenData->email)->first();
// Redirect the customer back if the email is invalid
    if (!$customer) return redirect()->back()->with(['error' => 'Không tìm thấy email']);
//Hash and update the new password
    $customer->password = \Hash::make($password);
    $customer->update(); //or $customer->save();

    //login the customer immediately they change password successfully
    Auth::guard('customer')->login($customer);

    //Delete the token
    DB::table('password_resets')->where('email', $customer->email)
    ->delete();

    return redirect()->route('front.index')->with('success','Mật khẩu đã được tạo lại thành công');

}

}