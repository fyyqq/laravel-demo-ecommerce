<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    protected $table = 'order_items';

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
