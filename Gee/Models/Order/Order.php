<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_number','total','is_vat','customer_id','company_id','payment_type','status','guest_id'];

    public function customer(){
    	return $this->belongsTo(\App\Models\Order\Customer::class);
    }

    public function guest(){
        return $this->belongsTo(\App\Models\Order\Guest::class);
    }

    public function prds(){
    return $this->belongsToMany(\App\Models\Prd\Prd::class,'order_prds')->withPivot('qty','total','price');
    }

    public function shipment()
    {
    	return $this->hasOne(\App\Models\Order\Shipment::class);
    }

    public function company(){
    	return $this->belongsTo(\App\Models\Order\Company::class);
    }
}
