<?php

namespace App\Repositories\Contracts;

use App\Data\CartProductData;
use App\Models\Cart;

interface CartRepositoryContract
{
    public function updateOrCreate(CartProductData $data): Cart;

    public function delete(Cart $cart): void;
}
