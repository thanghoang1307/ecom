<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class PageController extends Controller {
	public function index() {
	return view('front.index');
	}
}