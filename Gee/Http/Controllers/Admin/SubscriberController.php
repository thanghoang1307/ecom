<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SubscriberController extends Controller
{
    public function index(){
        $subscribers = DB::table('subscribers')->paginate(12);
        return view('admin.subscriber.index',compact('subscribers'));
    }
}
