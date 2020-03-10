<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function shipments(){
    	return $this->hasMany(\App\Models\Order\Shipment::class,'matp','matp');
    }
}
