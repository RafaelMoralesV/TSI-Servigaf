<?php

namespace App\Models;

use Gloudemans\Shoppingcart\CanBeBought;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model implements Buyable
{
    use HasFactory;
    use SoftDeletes;
    use CanBeBought;

    protected $fillable = [
        'name',
        'category_id',
        'brand',
        'price',
        'description',
        'stock',
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function transactions(): BelongsToMany
    {
        return $this->belongsToMany(Transaction::class, 'orders');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function group(): HasOneThrough {
        return $this->hasOneThrough(CategoryGroup::class, Category::class);
    }
}
