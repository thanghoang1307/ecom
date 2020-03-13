<?php
namespace App\Repositories\Prd;

use App\Repositories\EloquentRepository;
use App\Repositories\Prd\AttrFamilyInterface;

class AttrFamilyRepository extends EloquentRepository implements AttrFamilyInterface {

	public function getModel(){
		return \App\Models\Prd\AttrFamily::class;
	}
}
