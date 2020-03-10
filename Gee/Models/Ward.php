<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    public function shipments(){
    	return $this->hasMany(\App\Models\Order\Shipment::class,'maphuong','maphuong');
    }
}
