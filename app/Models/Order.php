<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function customer() {
        return $this->belongsTo(User::class, 'customer_id');
    }
    
    public function items() {
        return $this->hasMany(OrderItem::class);
    }
    
}
