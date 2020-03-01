<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name','mst','address','note'];

    public function orders(){
    	return $this->hasMany(\App\Models\Order\Order::class);
    }
}
