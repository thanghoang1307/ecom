<?php

namespace App\Repositories\Order;

use App\Repositories\Order\OrderPrdInterface;
use App\Repositories\EloquentRepository;

class OrderPrdRepository extends EloquentRepository implements OrderPrdInterface {

	public function getModel() {
		return \App\Models\Order\OrderPrd::class;
	}
}