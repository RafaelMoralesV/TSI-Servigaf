<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['transaction_id', 'product_id', 'amount', 'total_price'];

    public function transaction(): BelongsTo {
        return $this->belongsTo(Transaction::class);
    }

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }
}
