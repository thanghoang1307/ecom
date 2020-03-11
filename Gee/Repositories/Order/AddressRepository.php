<?php

namespace App\Repositories\Order;

use App\Repositories\Order\AddressInterface;
use App\Repositories\EloquentRepository;

class AddressRepository extends EloquentRepository implements AddressInterface {

	public function getModel() {
		return \App\Models\Order\Address::class;
	}

	public function setOtherNotPrimary() {
	$this->_model->where('customer_id',auth('customer')->id())->update(array('is_primary' => 0));
	}

	public function getPrimary() {
	$primary = $this->_model->where('customer_id',auth('customer')->id())->where('is_primary',1)->first();
	return $primary;
	}

	public function count(){
	return $this->_model->where('customer_id',auth('customer')->id())->count();
	}

	public function setFirstAsPrimary(){
	$primary = $this->_model->where('customer_id',auth('customer')->id())->first();
	$primary->update(['is_primary' => 1]);
	return $primary;
	}
}