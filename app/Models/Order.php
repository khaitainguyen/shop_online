<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    /**
     * Get the order detail  associated with the order.
     */
    public function orderDetail()
    {
        return $this->hasOne(OrderDetail::class);
    }
}
