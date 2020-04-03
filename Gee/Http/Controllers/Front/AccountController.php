<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Repositories\Order\CustomerInterface;
use App\Repositories\Order\AddressInterface;
use App\Repositories\Order\OrderInterface;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Validator;
use Socialite;
use Auth;

class AccountController extends Controller
{	
	protected $customer;
    protected $address;

    public function __construct(CustomerInterface $customer,AddressInterface $address, OrderInterface $order)
    {
      $this->customer = $customer;
      $this->address = $address;
      $this->order = $order;
  }

  public function index(){
    $primary_address = $this->address->getPrimary();
    if (!$primary_address){
        $primary_address = $this->address->setFirstAsPrimary();
    }
    return view('front.profile',compact('primary_address'));
}

public function edit(){
   return view('front.profile_edit');
}

public function update(Request $request){
   $customer = $this->customer->find(auth('customer')->id());
   $customer->update($request->all());
   return redirect()->route('front.account.index');
}

public function editPassword(){
   return view('front.edit_password');
}

public function updatePassword(Request $request){
    $customer = auth('customer')->user();
    $messages = [
        'required' => ':attribute không được để trống',
        'confirmed' => ':attribute không trùng khớp'];
    $niceNames = array(
        'password' => 'Mật khẩu mới',
        'old_password' => 'Mật khẩu cũ',
        'password_confirmation' => 'Mật khẩu xác nhận');
    $validator = Validator::make($request->all(), [
    'old_password' => 'required',
        'password' => 'required|confirmed',
        'password_confirmation' => 'required',
],$messages);
    $validator->setAttributeNames($niceNames)->validate(); 

    if (Hash::check($request->old_password, $customer->password)) { 
     $customer->fill([
        'password' => Hash::make($request->password)
    ])->save();

     $request->session()->flash('success', 'Password changed');
     return redirect()->route('front.account.edit_password');

 } else {
    $request->session()->flash('error', 'Password does not match');
    return redirect()->route('front.account.edit_password');
}
}

public function addAddress(){
  return view('front.add_address');
}

public function storeAddress(Request $request){
    $count = $this->address->count();
    if ($count){
        $is_primary = $request->is_primary == 'on' ? 1 : 0;
        if ($is_primary){
            $this->address->setOtherNotPrimary();
        }
    } else {
        $is_primary = 1;
    }
    $address = $this->address->create([
        'receiver' => $request->receiver,
        'phone' => $request->phone,
        'address' => $request->address,
        'is_primary' => $is_primary,
        'customer_id' => auth('customer')->id(),
        'matp' => $request->city,
        'maqh' => $request->district,
        'maphuong' => $request->ward,
    ]);
    return redirect()->route('front.account.address');
}

public function address(){
    $addresses = $this->address->getAllData();
    return view('front.address',compact('addresses'));
}

public function deleteAddress($id){
    $address = $this->address->find($id);
    if ($address->is_primary){
        $this->address->setFirstAsPrimary();
    }
    $this->address->delete($id);
    return redirect()->back();
}

public function editAddress($id){
    $address = $this->address->find($id);
    return view('front.edit_address',compact('address'));
}

public function updateAddress($id,Request $request){
    $is_primary = $request->is_primary ? 1 : 0;
    if ($is_primary){
        $this->address->setOtherNotPrimary();
    }
    $address = $this->address->update($id,[
        'receiver' => $request->receiver,
        'phone' => $request->phone,
        'address' => $request->address,
        'is_primary' => $is_primary,
        'customer_id' => auth('customer')->id(),
        'matp' => $request->city,
        'maqh' => $request->district,
        'maphuong' => $request->ward,
    ]);
    return redirect()->route('front.account.address');
}

public function orderHistory(){
    $orders = auth('customer')->user()->orders()->where('status','>=',-1)->paginate(10);
    return view('front.order_history',compact('orders'));
}

public function orderDetail($id){
    $order = $this->order->find($id);
    return view('front.order_detail',compact('order'));
}

}