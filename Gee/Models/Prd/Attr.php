<?php

namespace App\Models\Prd;

use Illuminate\Database\Eloquent\Model;

class Attr extends Model
{
    protected $fillable = ['code','name','type','is_required','is_looped'];

    public function attr_grs() {
		return $this->belongsToMany(\App\Models\Prd\AttrGr::class,'attr_gr_mappings','attr_id','attr_gr_id');
	}

	public function prds() {
		return $this->belongsToMany(\App\Models\Prd\Prd::class,'prd_attr_vals','attr_id','prd_id');
	}
}
