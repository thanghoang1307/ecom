<?php
namespace App\Repositories\Prd;

use App\Repositories\EloquentRepository;
use App\Repositories\Prd\AttrGrMapInterface;
use App\Repositories\Prd\AttrGrInterface;
use App\Repositories\Prd\AttrInterface;

class AttrGrMapRepository extends EloquentRepository implements AttrGrMapInterface {
	private $attr_gr;
	private $attr;
	public function __construct(AttrGrInterface $attr_gr, AttrInterface $attr){
	parent::__construct();
	$this->attr_gr = $attr_gr;
	$this->attr = $attr;
	}
	public function getModel(){
	return \App\Models\Prd\AttrGrMap::class;
	}

	public function deleteAttrFromAttrGr($attr_id,$attr_gr_id){
	$attr_map = $this->_model->where('attr_id',$attr_id)->where('attr_gr_id',$attr_gr_id);
	$attr_map->delete();
	}

	public function deleteByAttrId($attr_id){
	$this->_model->where('attr_id',$attr_id)->delete();
	}

}
