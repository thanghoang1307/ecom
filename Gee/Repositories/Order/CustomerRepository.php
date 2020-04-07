<?php

namespace App\Repositories\Order;

use App\Repositories\Order\CustomerInterface;
use App\Repositories\EloquentRepository;

class CustomerRepository extends EloquentRepository implements CustomerInterface {

	public function getModel() {
		return \App\Models\Order\Customer::class;
	}

	public function findByEmail ($email){
		return $this->_model->where('email',$email)->first();
	}
}