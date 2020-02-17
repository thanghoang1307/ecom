<?php

namespace App\Models\Prd;

use Illuminate\Database\Eloquent\Model;

class Prd extends Model
{	protected $fillable = ['sku','name'];
	public function brand() {
		return $this->belongsTo(Brands::class);
	}
}
