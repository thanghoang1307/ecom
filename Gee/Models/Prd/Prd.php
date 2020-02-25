<?php

namespace App\Models\Prd;

use Illuminate\Database\Eloquent\Model;

class Prd extends Model
{	protected $fillable = ['sku','name','brand_id','regular_price','sale_price','short_desc','long_desc','thumb','meta_title','meta_desc','meta_keys','slug','view','sale','current_price'];
	public function brand() {
		return $this->belongsTo(\App\Models\Prd\Brand::class);
	}

	public function attrs(){
		return $this->belongsToMany(\App\Models\Prd\Attr::class,'prd_attr_vals','prd_id','attr_id')->withPivot('text_val', 'boolean_val','datetime_val','integer_val','float_val','date_val');
	}

	public function cats(){
		return $this->belongsToMany(\App\Models\Prd\Cat::class,'prd_cats','prd_id','cat_id');
	}

	public function images(){
		return $this->hasMany(\App\Models\Prd\PrdImage::class);
	}
}
