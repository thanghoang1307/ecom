<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = ['name','gender','phone','email'];

    public function orders(){
    	return $this->hasMany(\App\Models\Order\Order::class);
    }
}
