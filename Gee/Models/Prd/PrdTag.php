<?php

namespace App\Models\Prd;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{	
    protected $fillable = ['prd_id','tag_id'];
    public $timestamps = false;
}
