<?php

namespace App\Http\Controllers\Admin\Order;

use Illuminate\Http\Request;
use App\Models\Order\Customer;//user model can kiem tra
use App\Models\Order\Guest;
use App\Http\Controllers\Controller as Controller;
use Auth; //use thư viện auth

class CustomerController extends Controller
{

    public function index(){
    $customers = Customer::all();
    $guests = Guest::all();
    $merges = $customers->concat($guests);
    return view('admin.customer.index',compact('merges'));
    }

    public function show($type, $id){
    if($type = 'customer'){
        $customer = Customer::find($id);
    } else {
        $customer = Guest::find($id);
    }
    return view('admin.customer.show',compact('customer'));
    }
}