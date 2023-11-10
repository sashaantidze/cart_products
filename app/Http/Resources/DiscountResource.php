<?php

namespace App\Http\Resources;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DiscountResource extends JsonResource
{

    public function __construct(float | int $discount, Collection $cart)
    {
        $this->discountResource = $discount;
        $this->productResource = $cart;
    }

    public function toArray(Request $request): array
    {
        return [
            'products' => CartResource::collection($this->productResource),
            'discount' => $this->discountResource,
        ];
    }
}
