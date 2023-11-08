<?php

namespace App\Repositories;

use App\Data\CartProductData;
use App\Models\Cart;
use App\Repositories\Contracts\CartRepositoryContract;

class CartRepository implements CartRepositoryContract
{
    public function updateOrCreate(CartProductData $data): Cart
    {
        $item = $this->getModel()->updateOrCreate([
            'product_id' => $data->product_id,
            'user_id' => $data->user_id,
        ], [
            'quantity' => $data->quantity
        ]);

        return $item;
    }

    public function delete(Cart $cart): void
    {
        $cart->delete();
    }

    private function getModel(): Cart
    {
        return new Cart();
    }
}
