<?php

namespace App\Models\Prd;

use Illuminate\Database\Eloquent\Model;

class Prd extends Model
{	protected $fillable = ['sku','name','brand_id','regular_price','sale_price','short_desc','long_desc','thumb','slug','view','sale','current_price','attr_family_id'];
	public function brand() {
		return $this->belongsTo(\App\Models\Prd\Brand::class);
	}

	public function attrs(){
		return $this->belongsToMany(\App\Models\Prd\Attr::class,'prd_attr_vals','prd_id','attr_id')->withPivot('text_val', 'boolean_val','datetime_val','integer_val','float_val','date_val','textarea_val');
	}

	public function cats(){
		return $this->belongsToMany(\App\Models\Prd\Cat::class,'prd_cats','prd_id','cat_id');
	}

	public function images(){
		return $this->hasMany(\App\Models\Prd\PrdImage::class);
	}

	public function orders(){
    return $this->belongsToMany(\App\Models\Order\Order::class,'order_prds')->withPivot('qty','total','price');
    }

    public function first_cat() {
    return $this->cats()->first();
}
public function attr_family(){
	return $this->belongsTo(\App\Models\Prd\AttrFamily::class);
}
}
