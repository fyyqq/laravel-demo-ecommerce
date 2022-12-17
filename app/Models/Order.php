<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    protected $table = 'orders';

    public function items() {
        return $this->hasMany(OrderItem::class);
    }
    
    public function rating() {
        return $this->hasMany(Rating::class);
    }
}
