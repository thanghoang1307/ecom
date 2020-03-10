<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function shipments(){
    	return $this->hasMany(\App\Models\Order\Shipment::class,'maqh','maqh');
    }
}
