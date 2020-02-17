<?php

namespace App\Models\Prd;

use Illuminate\Database\Eloquent\Model;

class AttrGrMap extends Model
{
	protected $table="attr_gr_mappings";
	protected $fillable = ['attr_id','attr_gr_id'];
	
}
