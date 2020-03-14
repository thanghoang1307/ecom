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

	public function getFromSlug($brand_slug){
		return $this->_model->where('slug',$brand_slug)->first();
	}
}