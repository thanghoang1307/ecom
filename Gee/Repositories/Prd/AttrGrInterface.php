<?php

namespace App\Repositories\Prd;

interface AttrGrInterface {
	public function getAttrsIn($id);
	public function getAttrsInIdArray($id);
}