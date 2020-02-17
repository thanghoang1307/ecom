<?php

namespace App\Models\Prd;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function prds(){
    	return $this->hasMany(Prd::class);
    }

    protected $fillable = ['name','slug','logo'];
}
