<?php

namespace App\Repositories\Prd;

interface PrdInterface {
	public function createUniqueSlug($slug);
	public function addAttr($prd_id, array $attrs_id_array = null);
	public function getAttrsIn($id);
	public function getAttrsInIdArray($id);
	public function deleteAttrFromPrd($attr_id,$prd_id);
	public function addAttrValue($prd_id,$attr_requests);
}