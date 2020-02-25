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

	public function getBrandId($id){
	return $this->_model->find($id)->prds->unique('brand_id')->pluck('brand_id');
	}

	public function filter($request){
	if ($request->brand){
	$brands = explode('_',$request->brand);
	} else {$brands = null;}
	if ($request->price){
		$prices = explode('_',$request->price);
	} else {$prices = null;}
	$orderby = explode('-',$request->orderby);
	$search = $request->search;
	$prds = $this->_model->find($request->cat_id)->prds()
	->where(function($q) use ($prices,$brands,$search,$orderby ){
	if ($brands){
	$q->whereIn('brand_id',$brands);
	}
	if ($search){
	$q->where('name','like','%'.$search.'%');
	}
	if ($prices){
	$i = 0;
	foreach ($prices as $price){
	$price = explode('-',$price);
	if ($i == 0){
		$q->where([
			['regular_price','>=',$price[0]],
			['regular_price','<=',$price[1]],
		]);
		$i++;
	} else {
		$q->orWhere([
			['regular_price','>=',$price[0]],
			['regular_price','<=',$price[1]],
		]);
	}
	}
	}
	
	})->orderBy($orderby[0] == 'price' ? 'now_price': $orderby[0],$orderby[1]);
	return $prds;
	}
}