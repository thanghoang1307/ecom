<?php

namespace App\Http\Controllers\Admin\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Repositories\Order\OrderInterface;
use App\Exports\OrdersExport;
use Maatwebsite\Excel\Excel;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCancel;
use App\User;


class OrderController extends Controller
{
  protected $order;
  public function __construct(OrderInterface $order)
  {
    $this->order = $order;
  }

  public function export(Request $request)
  {
    return \Excel::download(new OrdersExport(), 'orders.xlsx');
  }

  public function index(Request $request)
  {
    if ($request->status !== null) {
      $orders = $this->order->getByStatus($request->status);
    } else {
      $orders = $this->order->getAllOrder();
    }

    return view('admin.order.index', compact('orders'));
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
    return redirect()->route('admin.order.index')->with('success','Cập nhật thành công');
  }

  public function success($id)
  {
    $order = $this->order->find($id);
    $order->status = 5;
    $order->save();
    return redirect()->route('admin.order.index')->with('success','Đơn hàng đã hoàn tất');
  }

  public function fail($id, Request $request)
  {
    $order = $this->order->find($id);
    $order->status = -3;
    $order->cancel_reason = $request->cancel_reason;
    $order->save();
    $user = User::where('role', 0)->first();
    $customer = $order->customer_id ? $order->customer : $order->guest;
    // Backup your default mailer
			$backup = Mail::getSwiftMailer();

			// Setup your gmail mailer
			$transport = new \Swift_SmtpTransport('smtp.zoho.com', 587, 'tls');
			$transport->setUsername('sales@onestopshop.vn');
			$transport->setPassword('Osop@199');
			// Any other mailer configuration stuff needed...

			$gmail = new \Swift_Mailer($transport);
			// Set the mailer as gmail
			Mail::setSwiftMailer($gmail);

			// Send your message
			Mail::to($customer->email)->send(new OrderCancel($order));
			Mail::to($user->email)->send(new OrderCancel($order));

			// Restore your original mailer
      Mail::setSwiftMailer($backup);
      
    return redirect()->route('admin.order.index')->with('error','Đơn hàng đã bị huỷ');
  }
}
