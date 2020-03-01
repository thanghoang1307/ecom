<?php

namespace App\Repositories\Order;

use App\Repositories\Order\ShipmentInterface;
use App\Repositories\EloquentRepository;

class ShipmentRepository extends EloquentRepository implements ShipmentInterface {

	public function getModel() {
		return \App\Models\Order\Shipment::class;
	}
}