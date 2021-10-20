<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    public function client(): BelongsTo {
        return $this->belongsTo(Client::class);
    }

    public function order() {
        return $this->hasMany(Order::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class, 'orders');
    }
}
