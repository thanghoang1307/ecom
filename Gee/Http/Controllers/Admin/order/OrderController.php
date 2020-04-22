<?php

namespace App\Http\Controllers\Admin\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Repositories\Order\OrderInterface;


class OrderController extends Controller
{
  protected $order;
  public function __construct(OrderInterface $order)
  {
    $this->order = $order;
  }
  public function index()
  {
    $orders = $this->order->getAllOrder();
    return view('admin.order.index', compact('orders'));
  }

  public function filter(Request $request)
  {
    $orders = $this->order->getByStatus($request->status);
    return response()->json(['html' => view('admin.order.table', compact('orders'))->render()]);
  }

  public function edit($order_number)
  {
    $order = $this->order->getFromOrderNumber($order_number);
    return view('admin.order.edit', compact('order'));
  }

  public function update($order_number, Request $request)
  {
    $order = $this->order->getFromOrderNumber($order_number);
    $order->update(['status' => $request->status]);
    $order->save();
    return redirect()->route('admin.order.index');
  }
}
