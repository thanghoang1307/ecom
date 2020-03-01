<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class OrderPrd extends Model
{
    protected $fillable = ['order_id','prd_id','qty','price','total'];

    public function order(){
    	return $this->belongsTo(\App\Models\Order\Order::class);
    }
}
