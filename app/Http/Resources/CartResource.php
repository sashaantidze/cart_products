<?php

namespace App\Http\Resources;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    public function __construct(Cart | array $resource)
    {
        $this->resource = $resource;
    }
    public function toArray(Request $request): array
    {
        return [
            'product_id' => $this->resource->getProductId(),
            'quantity' => $this->resource->getQuantity(),
            'price' => $this->resource->product->getPrice(),
        ];
    }
}
