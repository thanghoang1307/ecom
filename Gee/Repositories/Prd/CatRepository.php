<?php

namespace App\Repositories\Prd;

use App\Repositories\Prd\CatInterface;
use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class CatRepository extends EloquentRepository implements CatInterface {
	private $structure_data;
	public function getModel() {
		return \App\Models\Prd\Cat::class;
	}

	public function getPrdByCat($id){
	return $this->_model->find($id)->prds()->get();
	}
}