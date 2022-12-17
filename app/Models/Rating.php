<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $table = 'ratings';

    protected $guarded = ["id"];

    public function order() {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
