<?php

namespace App\Models\Prd;

use Illuminate\Database\Eloquent\Model;

class AttrGr extends Model
{
	protected $fillable = ['name','position','attr_family_id'];

	public $timestamps = false;

	public function attrs() {
		return $this->belongsToMany(\App\Models\Prd\Attr::class,'attr_gr_mappings','attr_gr_id','attr_id');
	}

	public function attr_family(){
	return $this->belongsTo(\App\Models\Prd\AttrFamily::class);
	}
}
