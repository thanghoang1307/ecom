<?php

namespace App\Models\Prd;

use Illuminate\Database\Eloquent\Model;

class Prd extends Model
{	protected $fillable = ['sku','name','brand_id','regular_price','sale_price','short_desc','long_desc','thumb','meta_title','meta_desc','meta_keys','slug'];
	public function brand() {
		return $this->belongsTo(Brands::class);
	}

	public function attrs(){
		return $this->belongsToMany(\App\Models\Prd\Attr::class,'prd_attr_vals','prd_id','attr_id');
	}
}
