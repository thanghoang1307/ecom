<?php

namespace App\Http\Controllers\Admin\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Repositories\Order\OrderInterface;


class OrderController extends Controller
{
	protected $order;
	public function __construct(OrderInterface $order){
		$this->order = $order;
	}
  public function index(){
  $orders = $this->order->getAll();
  return view('admin.order.index',compact('orders'));
  }

  public function edit($order_number){
  $order = $this->order->getFromOrderNumber($order_number);
  return view('admin.order.edit',compact('order'));
  }

  public function update($order_number,Request $request){
    $order = $this->order->getFromOrderNumber($order_number);
    $order->update(['status' => $request->status]);
    $order->save();
    return redirect()->route('admin.order.index');
  }
}
