<?php

namespace App\Http\Requests;

use App\Data\CartProductData;
use App\Data\FindProductData;
use Illuminate\Foundation\Http\FormRequest;

class RemoveProductFromCartRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'product_id' => 'required|integer|exists:products,id',
        ];
    }

    public function getData(): CartProductData
    {
        return CartProductData::from($this->validated());
    }
}
