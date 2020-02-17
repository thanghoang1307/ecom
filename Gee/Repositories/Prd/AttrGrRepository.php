<?php
namespace App\Repositories\Prd;

use App\Repositories\EloquentRepository;
use App\Repositories\Prd\AttrGrInterface;

class AttrGrRepository extends EloquentRepository implements AttrGrInterface {

	public function getModel(){
	return \App\Models\Prd\AttrGr::class;
	}

	public function getAttrsIn($id){
	return $this->find($id)->attrs()->get();
	}

	public function getAttrsInIdArray($id){
	return $this->find($id)->attrs()->pluck('attr_id')->toArray();
	}
}
