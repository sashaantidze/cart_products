<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class FindProductData extends Data
{
    public function __construct(
        public int $product_id
    ) {}
}
