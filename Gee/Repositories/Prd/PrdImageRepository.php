<?php

namespace App\Repositories\Prd;

use App\Repositories\Prd\PrdImageInterface;
use App\Repositories\EloquentRepository;

class PrdImageRepository extends EloquentRepository implements PrdImageInterface {
	public function getModel() {
		return \App\Models\Prd\PrdImage::class;
	}

	public function addImages($prd_id, $images_str){
	$images_arr = explode(',',$images_str);
	$this->_model->where('prd_id',$prd_id)->delete();
	foreach ($images_arr as $image)
	{
		$this->_model->create([
		'prd_id' => $prd_id,
		'image' => $image,
		]);
	}

	}

	public function getInput($prd_id){
		return $this->_model->where('prd_id',$prd_id)->pluck('image')->toArray();
	}
}