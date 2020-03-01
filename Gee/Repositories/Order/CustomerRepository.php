<?php

namespace App\Repositories\Order;

use App\Repositories\Order\CustomerInterface;
use App\Repositories\EloquentRepository;

class CustomerRepository extends EloquentRepository implements CustomerInterface {

	public function getModel() {
		return \App\Models\Order\Customer::class;
	}
}