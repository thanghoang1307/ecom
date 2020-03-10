<?php

namespace App\Repositories\Order;

use App\Repositories\Order\GuestInterface;
use App\Repositories\EloquentRepository;

class GuestRepository extends EloquentRepository implements GuestInterface {

	public function getModel() {
		return \App\Models\Order\Guest::class;
	}
}