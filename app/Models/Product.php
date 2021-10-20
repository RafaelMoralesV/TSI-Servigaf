<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function order() {
        return $this->hasMany(Order::class);
    }

    public function transactions() {
        return $this->belongsToMany(Transaction::class, 'orders');
    }
}
