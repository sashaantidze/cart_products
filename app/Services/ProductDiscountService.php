<?php

namespace App\Services;

use App\Models\DiscountGroup;
use Illuminate\Database\Eloquent\Collection;

class ProductDiscountService
{

    protected float $totalCalculatedDiscount = 0;
    public function __construct(
        protected Collection $cartItems,
        protected DiscountGroup $discountGroup,
    ){
        $this->cartItems->load('product');
        $this->discountGroup->load('itemProducts');

        $this->calculateTotalDiscount();

    }

    public function shouldApplyDiscount(): bool
    {
        $cartProducts = $this->cartItems->pluck('product');
        $discountGroupItems = $this->discountGroup->itemProducts;

        $intersection = $discountGroupItems->intersect($cartProducts);

        return $intersection->count() === $discountGroupItems->count();
    }

    public function calculateTotalDiscount(): void
    {
        if (!$this->shouldApplyDiscount()) return;

        $indexedDiscountItems = $this->discountGroup->itemProducts->keyBy('id');

        $minQuantity = $indexedDiscountItems->pluck('cart')->min('quantity');
        $groupDiscount = $this->discountGroup->getDiscount();
        $totalCalculatedDiscount = 0;

         $this->cartItems->each(function ($cartItem) use ($indexedDiscountItems, $minQuantity, &$totalCalculatedDiscount, $groupDiscount) {
            $discountItem = $indexedDiscountItems[$cartItem->product_id] ?? null;

            if ($discountItem) {
                $totalNonDiscountedPrice = $discountItem->getPrice() * $minQuantity;
                $singleDiscountedItem = $discountItem->getPrice() - ($discountItem->price * $groupDiscount / 100);

                $totalDiscount = $totalNonDiscountedPrice - ($singleDiscountedItem * $minQuantity);

                $totalCalculatedDiscount += $totalDiscount;
            }
        });

         $this->totalCalculatedDiscount = $totalCalculatedDiscount;
    }

    public function getTotalDiscount(): float|int
    {
        return round($this->totalCalculatedDiscount,1);
    }
}
