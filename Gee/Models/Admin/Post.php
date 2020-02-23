<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable =['title','slug','content','post_type','meta_title','meta_desc','meta_keys','thumb'];
    protected $primaryKey = 'slug';
    public $incrementing = false;
}
