<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function shipments(){
    	return $this->hasMany(\App\Models\Order\Shipment::class,'maqh','maqh');
    }

    public function addresses(){
    	return $this->hasMany(\App\Models\Order\Address::class,'maqh','maqh');
    }

    public function city(){
    	return $this->belongsTo(\App\Models\City::class,'matp','matp');
    }

    public function wards(){
    	return $this->hasMany(\App\Models\Ward::class,'maqh','maqh');
    }
}
