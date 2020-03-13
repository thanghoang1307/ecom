<?php

namespace App\Models\Prd;

use Illuminate\Database\Eloquent\Model;

class AttrVal extends Model
{
	protected $fillable = ['attr_id','prd_id','text_val','boolean_val','datetime_val','integer_val','float_val','date_val','textarea_val'];

	public $timestamps = false;
}
