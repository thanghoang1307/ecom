<?php

namespace App\Models\Prd;

use Illuminate\Database\Eloquent\Model;

class PrdImage extends Model
{
	protected $fillable = ['prd_id','image'];
    public function prd(){
    	return $this->belongsTo(\App\Models\Prd\Prd::class);
    }
}
