<?php

namespace App\Repositories\Prd;

use App\Repositories\Prd\CatInterface;
use App\Repositories\EloquentRepository;

class CatRepository extends EloquentRepository implements CatInterface {
	public function getModel() {
		return \App\Models\Prd\Cat::class;
	}
}