<?php

namespace App\Repositories\Order;

use App\Repositories\Order\CompanyInterface;
use App\Repositories\EloquentRepository;

class CompanyRepository extends EloquentRepository implements CompanyInterface {

	public function getModel() {
		return \App\Models\Order\Company::class;
	}
}