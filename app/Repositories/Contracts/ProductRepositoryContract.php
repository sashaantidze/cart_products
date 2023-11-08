<?php

namespace App\Repositories\Contracts;

use App\Data\CartProductData;
use App\Models\Product;

interface ProductRepositoryContract
{
    public function find(CartProductData $data): ?Product;
}
