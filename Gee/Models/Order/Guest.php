<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Guest extends Authenticatable
{
	use Notifiable;

    protected $fillable = ['name','gender','phone','email'];

    public function orders(){
    	return $this->hasMany(\App\Models\Order\Order::class);
    }
}
