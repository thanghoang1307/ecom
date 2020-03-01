<?php

namespace App\Repositories\Order;

use App\Repositories\Order\OrderInterface;
use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderRepository extends EloquentRepository implements OrderInterface {

	public function getModel() {
	return \App\Models\Order\Order::class;
	}


	public function uniqueOrderNumber(){
	
	do {$order_number = Str::random(10);}
	while ($this->_model->where('order_number',$order_number)->first());
	return $order_number;
	}

	public function getFromOrderNumber($order_number){
		return $this->_model->where('order_number',$order_number)->first();
	}
	}