<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Repositories\Order\OrderInterface;
use App\Repositories\Order\CustomerInterface;
use App\Repositories\Order\CompanyInterface;
use App\Repositories\Order\ShipmentInterface;
use App\Repositories\Order\OrderPrdInterface;
use App\Repositories\Order\GuestInterface;
use App\Repositories\Prd\PrdInterface;
use App\Notifications\OrderComplete;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Auth;
use App\User;

class CartController extends Controller
{
	protected $order;
	protected $customer;
	protected $company;
	protected $shipment;
	protected $order_prd;
	protected $prd;
	protected $guest;

	public function __construct( OrderInterface $order, CustomerInterface $customer, CompanyInterface $company, ShipmentInterface $shipment, PrdInterface $prd, OrderPrdInterface $order_prd, GuestInterface $guest){
		$this->order = $order;
		$this->customer = $customer;
		$this->company = $company;
		$this->shipment = $shipment;
		$this->prd = $prd;
		$this->order_prd = $order_prd;
		$this->guest = $guest;
	}

	public function checkOut2(Request $request){
		// Lưu thông tin vào session
		session()->put('cart.gender',$request->gender);
		session()->put('cart.name',$request->name);
		session()->put('cart.phone',$request->phone);
		session()->put('cart.email',$request->email);
		session()->put('cart.city',$request->city);
		session()->put('cart.district',$request->district);	
		session()->put('cart.ward',$request->ward);
		session()->put('cart.address',$request->address);
		session()->put('cart.note',$request->note);
		
		// Validate
		$validatedData = $request->validate([
        'gender' => 'required',
        'name' => 'required',
		// 'phone' => 'required|regex:/(0)[0-9]{9}/',
		'phone' => 'required',
        'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
        'city' => 'required',
        'district' => 'required',
        'ward' => 'required',
        'address' => 'required',
    ]);

		$order_arr = [
			'order_number' => $this->order->uniqueOrderNumber(),
			'total' => $this->prd->sumPrice(session('cart.items')),
			'status' => -2,
		];
		if (Auth::guard('customer')->check()){
			$order_arr = array_merge($order_arr,['customer_id' => Auth::guard('customer')->id(),]);
		} else {
			$guest = $this->guest->create([
				'gender' => $request->gender,
				'name' => $request->name,
				'phone' => $request->phone,
				'email' => $request->email,
			]);
			$order_arr = array_merge($order_arr,['guest_id' => $guest->id,]);	
		}

		$order = $this->order->create($order_arr);

		$shipment = $this->shipment->create([
			'address' => $request->address,
			'matp' => $request->city,
			'maqh' => $request->district,
			'maphuong' => $request->ward,
			'order_id' => $order->id,
			'note' => $request->note,
		]);

		return redirect()->route('front.thanh_toan',$order->order_number);
	}

	public function checkOut3(Request $request,$order_number){
		$company = null;
		if ($request->is_vat){
			$validatedData = $request->validate([
        'name' => 'required',
        'mst' => 'required|numeric',
        'address' => 'required',
    ]);
			$company = $this->company->create(
				[
					'name' => $request->name,
					'mst' => $request->mst,
					'address' => $request->address,
					'note' => $request->note,
				]
			);
			$order = $this->order->getFromOrderNumber($order_number);
			$order->update([
				'is_vat' => 1,
				'company_id' => $company->id,
				'payment_type' => $request->payment_type,
			]);
		}

		return redirect()->route('front.success',$order_number);
	}

	public function success($order_number){
		$order = $this->order->getFromOrderNumber($order_number);
		$order->update(['status' => 0]);
		foreach (session('cart.items') as $key => $value){
		$price = $this->prd->find($key)->current_price;
		$order_prd = $this->order_prd->create([
				'order_id' => $order->id,
				'prd_id' => $key,
				'qty' => $value,
				'price' => $price,
				'total' => $value*$price,]);
		}
		session()->forget('cart');
		$user = User::where('role',0)->first();
		$customer = $order->customer_id ? $order->customer : $order->guest;
		$customer->notify(new OrderComplete($order));
		$user->notify(new OrderComplete($order));
		return view('front.success',compact('order'));
	}

	public function ajaxUpdateCart(Request $request){
		session()->put('cart.items.'.$request->prd_id,$request->qty);
		$total = $this->prd->sumPrice(session('cart.items'));
		return response()->json(['total' => $total]);
	}

	public function ajaxRemoveItem(Request $request){
		session()->forget('cart.items.'.$request->prd_id);
		$total = $this->prd->sumPrice(session('cart.items'));
		return response()->json(['total' => $total]);
	}

	public function taiBaoGia(){
		$carts = session()->get('cart.items');
	if ($carts){
	$ids = array_keys(session()->get('cart.items'));
	$prds = $this->prd->find($ids);
	$total = $this->prd->sumPrice($carts);
	}
	else {
	$prds = [];
	$total = 0;
	}	
		$pdf = PDF::loadView('pdf.bao_gia', ['prds' => $prds, 'total' => $total, 'carts' => $carts])->setPaper('a4', 'landscape');
		return $pdf->stream('Bao_Gia_'.Carbon::now()->format('d-m-Y_H-i')."_OneStopShop_VN.pdf");
	}

}
