<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function shipments(){
    	return $this->hasMany(\App\Models\Order\Shipment::class,'matp','matp');
    }

    public function addresses(){
    	return $this->hasMany(\App\Models\Order\Address::class,'matp','matp');
    }

    public function districts(){
    	return $this->hasMany(\App\Models\District::class,'matp','matp');
    }
}
