<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    public function shipments(){
    	return $this->hasMany(\App\Models\Order\Shipment::class,'maphuong','maphuong');
    }

    public function addresses(){
    	return $this->hasMany(\App\Models\Order\Address::class,'maphuong','maphuong');
    }

    public function district(){
    	return $this->belongsTo(\App\Models\District::class,'maqh','maqh');
    }
}
