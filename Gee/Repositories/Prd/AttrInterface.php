<?php

namespace App\Repositories\Prd;

interface AttrInterface {
public function getAttrGrs($id);
public function getAttrNotIn(array $attr_in_id);
}