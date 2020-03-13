<?php

namespace App\Models\Prd;

use Illuminate\Database\Eloquent\Model;

class AttrGrMap extends Model
{
	protected $table="attr_gr_mappings";
	public $timestamps=false;
	protected $fillable = ['attr_id','attr_gr_id'];
	public function attrs(){
		return $this->belongsToMany(\App\Models\Prd\Attr::class);
	}

	public function attr_grs(){
		return $this->belongsToMany(\App\Models\Prd\AttrGr::class);
	}
}
