<?php

namespace App\Http\Controllers\Admin\Order;

use Illuminate\Http\Request;
use App\Models\Order\Customer; //user model can kiem tra
use App\Models\Order\Guest;
use App\Http\Controllers\Controller as Controller;
use Auth; //use thư viện auth

class CustomerController extends Controller
{

    public function index(Request $request)
    {
        if (!$request->status) {
            $customers = Customer::where('status', 'active')->paginate(12);
        } else if($request->status == 'guest') {
            $customers = Guest::paginate(12);
        } else {
            $customers = Customer::where('status', $request->status)->paginate(12);
        }

        return view('admin.customer.index', compact('customers'));
    }

    public function show($type, $id)
    {
        if ($type == 'customer') {
            $customer = Customer::find($id);
        } else {
            $customer = Guest::find($id);
        }
        return view('admin.customer.show', compact('customer'));
    }

    public function deactive($id)
    {
        $user = Auth::user();
        $customer = Customer::find($id);
        $customer->status = 'inactive';
        $customer->save();
        Auth::setUser($customer);
        Auth::guard('customer')->logout();
        Auth::setUser($user);
        return redirect()->route('admin.customer.index');
    }

    public function active($id)
    {
        $customer = Customer::find($id);
        $customer->status = 'active';
        $customer->save();
        return redirect()->route('admin.customer.index');
    }
}
