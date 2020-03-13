<?php

namespace App\Models\Prd;

use Illuminate\Database\Eloquent\Model;

class AttrFamily extends Model
{
	protected $fillable = ['name'];

	public function attr_grs(){
		return $this->hasMany(\App\Models\Prd\AttrGr::class,'attr_family_id','id');
	}

	public function attr_gr_maps(){
		return $this->hasManyThrough(\App\Models\Prd\AttrGrMap::class,\App\Models\Prd\AttrGr::class,'attr_family_id','attr_gr_id','id','id');
	}

}
