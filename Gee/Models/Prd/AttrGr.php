<?php

namespace App\Models\Prd;

use Illuminate\Database\Eloquent\Model;

class AttrGr extends Model
{
	protected $fillable = ['name'];

	public function attrs() {
		return $this->belongsToMany(\App\Models\Prd\Attr::class,'attr_gr_mappings','attr_gr_id','attr_id');
	}
}
