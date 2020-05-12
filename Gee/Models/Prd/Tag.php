<?php

namespace App\Models\Prd;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{	
    protected $fillable = ['name'];
    public $timestamps = false;

    public function prds(){
        return $this->belongsToMany(\App\Models\Prd\Prd::class,'prd_tags','tag_id','prd_id');
    }
}
