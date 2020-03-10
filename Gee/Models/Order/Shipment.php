<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $fillable = ['address','matp','maqh','maphuong','order_id'];

    public function order(){
    	return $this->belongsTo(\App\Models\Order\Order::class);
    }

    public function city(){
    	return $this->belongsTo(\App\Models\City::class,'matp','matp');
    }

    public function district(){
    	return $this->belongsTo(\App\Models\District::class,'maqh','maqh');
    }

    public function ward(){
    	return $this->belongsTo(\App\Models\Ward::class,'maphuong','maphuong');
    }
}
