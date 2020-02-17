<?php
namespace App\Repositories\Prd;

use App\Repositories\EloquentRepository;
use App\Repositories\Prd\PrdInterface;

class PrdRepository extends EloquentRepository implements PrdInterface {
	public function getModel(){
	return \App\Models\Prd\Prd::class;
	}

	public function getHotPrd(){

	}
}
