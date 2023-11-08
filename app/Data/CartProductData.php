<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class CartProductData extends Data
{
    public function __construct(
        public int $product_id,
        public ?int $quantity,
        public ?int $user_id,
    ) {}
}
