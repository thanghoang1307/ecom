<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['name','link','image','position_id'];
}
