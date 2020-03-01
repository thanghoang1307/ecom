<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['gender','name','phone','email'];

    public function orders(){
    	return $this->hasMany(\App\Models\Order\Order::class);
    }
}
