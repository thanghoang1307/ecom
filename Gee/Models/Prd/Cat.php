<?php

namespace App\Models\Prd;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $fillable = ['slug','name','meta_title','meta_desc','meta_keys','parent_id'];
}
