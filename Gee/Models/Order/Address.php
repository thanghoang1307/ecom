<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['receiver','phone','address','customer_id','is_primary','matp','maqh','maphuong'];

    public function customer(){
    	return $this->belongsTo(\App\Models\Order\Customer::class);
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
