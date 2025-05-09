<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sanpham;

class OrderItem extends Model
{
    //
    protected $table = 'order_items';
    protected $fillable = ['id', 'order_id', 'product_id', 'quantity', 'price'];
    public function order()
{
    return $this->belongsTo(Order::class);
}

public function product()
{
    return $this->belongsTo(Sanpham::class);
}

}
