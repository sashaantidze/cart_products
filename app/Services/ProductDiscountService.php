<?php

namespace App\Services;

use App\Models\DiscountGroup;
use Illuminate\Database\Eloquent\Collection;

class ProductDiscountService
{
    public function __construct(
        protected Collection $cartItems,
        protected DiscountGroup $discountGroup,
    ){
        $this->cartItems->load('product');
        $this->discountGroup->load('itemProducts');
    }

    public function shouldApplyDiscount(): bool
    {
        $cartProducts = $this->cartItems->pluck('product');
        $discountGroupItems = $this->discountGroup->itemProducts;

        $intersection = $discountGroupItems->intersect($cartProducts);

        return $intersection->count() === $discountGroupItems->count();
    }

    public function calculateTotalDiscount()
    {
        $indexedDiscountItems = $this->discountGroup->itemProducts->keyBy('id');

        $minQuantity = $indexedDiscountItems->pluck('cart')->min('quantity');
        $groupDiscount = $this->discountGroup->getDiscount();
        $totalCalculatedDiscount = 0;

         $this->cartItems->each(function ($cartItem) use ($indexedDiscountItems, $minQuantity, $totalCalculatedDiscount, $groupDiscount) {
            $discountItem = $indexedDiscountItems[$cartItem->product_id] ?? null;

            if ($discountItem) {
                //dd($discountItem);
                $totalNonDiscountedPrice = $discountItem->price * $minQuantity;
                $singleDiscountedItem = $discountItem->price - ($discountItem->price * $groupDiscount / 100);

                $totalDiscount = $totalNonDiscountedPrice - ($singleDiscountedItem * $minQuantity);

                //$totalCalculatedDiscount += $totalDiscount;

                dump($totalDiscount);
            }

        });

//        dd($totalCalculatedDiscount);

    }
}
