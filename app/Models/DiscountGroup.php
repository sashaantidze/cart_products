<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class DiscountGroup extends Model
{
    use HasFactory;

    protected $table = 'user_product_groups';

    protected $fillable = [
        'discount'
    ];

    // might not need, remove later if so
    public function groupItems(): HasMany
    {
        return $this->hasMany(DiscountGroupItem::class, 'group_id');
    }

    public function itemProducts(): HasManyThrough
    {
        return $this->hasManyThrough(
            Product::class,
            DiscountGroupItem::class,
            'group_id',
            'id',
            'id',
            'product_id'
        );
    }

    public function getDiscount(): float
    {
        return $this->discount;
    }
}
