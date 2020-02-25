<?php

namespace App\Repositories\Prd;

use App\Repositories\Prd\BrandInterface;
use App\Repositories\EloquentRepository;

class BrandRepository extends EloquentRepository implements BrandInterface {
	public function getModel() {
		return \App\Models\Prd\Brand::class;
	}

	public function getBrandFromIds($id){
	return $this->_model->find($id);
	}
}