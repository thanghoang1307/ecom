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

		session()->put('cart.customer.gender',$request->gender);
		session()->put('cart.customer.name',$request->name);
		session()->put('cart.customer.phone',$request->phone);
		session()->put('cart.customer.email',$request->email);
		session()->put('cart.shipment.city',$request->city);
		session()->put('cart.shipment.district',$request->district);
		session()->put('cart.shipment.ward',$request->ward);
		session()->put('cart.shipment.address',$request->address);
		session()->put('cart.shipment.note',$request->note);

		return redirect()->route('front.thanh_toan');
	}

	public function checkOut3(Request $request){
		$company = null;
		if ($request->is_vat){
			$company = $this->company->create(
				[
					'name' => $request->name,
					'mst' => $request->mst,
					'address' => $request->address,
					'note' => $request->note,
				]
			);
		}

		$order_arr = [
			'order_number' => $this->order->uniqueOrderNumber(),
			'total' => $this->prd->sumPrice(session('cart.items')),
			'is_vat' => $request->is_vat ? 1 : 0,
			'company_id' => $company ? $company->id : null,
			'payment_type' => $request->payment_type,
			'status' => 0,
		];
		if (Auth::guard('customer')->check()){
			$order_arr = array_merge($order_arr,['customer_id' => Auth::guard('customer')->id(),]);
		} else {
			$guest = $this->guest->create([
				'gender' => session('cart.customer.gender'),
				'name' => session('cart.customer.name'),
				'phone' => session('cart.customer.phone'),
				'email' => session('cart.customer.email'),
			]);
			$order_arr = array_merge($order_arr,['guest_id' => $guest->id,]);	
		}
		$order = $this->order->create($order_arr);
		session()->put('order_number',$order->order_number);
		foreach (session('cart.items') as $key => $value){
			$price = $this->prd->find($key)->current_price;
			$order_prd = $this->order_prd->create([
				'order_id' => $order->id,
				'prd_id' => $key,
				'qty' => $value,
				'price' => $price,
				'total' => $value*$price,]);
		}
		$shipment = $this->shipment->create([
			'address' => session('cart.shipment.address'),
			'matp' => session('cart.shipment.city'),
			'maqh' => session('cart.shipment.district'),
			'maphuong' => session('cart.shipment.ward'),
			'order_id' => $order->id,
		]);
		return redirect()->route('front.success');
	}

	public function success(){
		$order = $this->order->getFromOrderNumber(session('order_number'));
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
		$pdf = PDF::loadView('pdf.bao_gia', ['prds' => $prds, 'total' => $total, 'carts' => $carts]);
		return $pdf->stream();
	}

}
