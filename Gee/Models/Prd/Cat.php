<?php

namespace App\Models\Prd;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $fillable = ['slug','name','meta_title','meta_desc','meta_keys','parent_id','short_name'];

    public function prds(){
		return $this->belongsToMany(\App\Models\Prd\Prd::class,'prd_cats','cat_id','prd_id');
	}

	public function parent(){
		return $this->belongsTo(\App\Models\Prd\Cat::class,'parent_id');
	}

	public function childrens(){
		return $this->hasMany(\App\Models\Prd\Cat::class,'parent_id');
	}
}
