<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\PostScope;

class Post extends Model
{
    protected $fillable =['title','slug','content','post_type','meta_title','meta_desc','meta_keys','thumb','is_show'];
    protected $primaryKey = 'slug';
    public $incrementing = false;
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new PostScope);
    }
}
