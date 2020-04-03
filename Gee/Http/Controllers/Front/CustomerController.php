<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Order\Customer;
use Illuminate\Support\Facades\Hash;
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
        $password = Hash::make($request->password);
        $request->validate([
            'phone' => 'required|min:9',
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required|confirmed',
            'gender' => 'required',
            ]);
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
        Auth::guard('customer')->attempt($arr);
        return redirect()->intended('/');
    }

    public function redirect($provider){
    return Socialite::driver($provider)->redirect();
    }

    public function callback($provider){
        $getInfo = Socialite::driver($provider)->user(); 
   $customer = $this->createUser($getInfo,$provider); 
   Auth::guard('customer')->login($customer); 
   return redirect()->intended('/');
    }

    function createUser($getInfo,$provider){
 $customer = Customer::where('provider_id', $getInfo->id)->first();
 if (!$customer) {
      $customer = Customer::create([
         'name'     => $getInfo->name,
         'email'    => $getInfo->email,
         'provider' => $provider,
         'provider_id' => $getInfo->id,
     ]);
   }
   return $customer;
 }

    public function logOut(){
    Auth::guard('customer')->logout();
    return redirect()->route('front.index');
    }

    public function logIn(Request $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        
        if (Auth::guard('customer')->attempt($arr)) {
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}