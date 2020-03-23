<?php
namespace App\Repositories\Prd;

use App\Repositories\EloquentRepository;
use App\Repositories\Prd\AttrInterface;

class AttrRepository extends EloquentRepository implements AttrInterface {
	
	public function getModel(){
	return \App\Models\Prd\Attr::class;
	}

	public function getAttrGrs($id){
	return $this->find($id)->attr_grs();
	}

	public function getAttrNotIn(array $attr_in_id){
		return $this->_model->whereNotIn('id',$attr_in_id)->get();
	}

	public function findOrder($id)
	{
		return $this->_model->whereIn('id',$id)->orderBy('position','asc')->get();
	}
}
