<?php

namespace App\Repositories;

use App\Data\CartProductData;
use App\Data\FindProductData;
use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryContract;

class ProductRepository implements ProductRepositoryContract
{
    public function find(CartProductData $data): ?Product
    {
        return $this->getModel()->find($data->product_id);
    }

    private function getModel(): Product
    {
        return new Product();
    }
}
