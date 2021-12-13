<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class CategoryGroup extends Model
{
    use HasFactory;

    protected $fillable = ['group_name'];

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function products(): HasManyThrough
    {
        return $this->hasManyThrough(Product::class, Category::class);
    }
}
