<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function order() {
        return $this->hasMany(Order::class);
    }

    public function transactions() {
        return $this->belongsToMany(Transaction::class, 'orders');
    }
}
