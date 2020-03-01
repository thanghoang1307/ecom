<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $fillable = ['address','city_id','district_id','ward_id','order_id'];

    public function order(){
    	return $this->belongsTo(\App\Models\Order\Order::class);
    }
}
