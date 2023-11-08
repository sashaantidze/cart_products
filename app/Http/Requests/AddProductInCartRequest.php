<?php

namespace App\Http\Requests;

use App\Data\CartProductData;
use Illuminate\Foundation\Http\FormRequest;

class AddProductInCartRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'product_id' => 'required|integer|exists:products,id',
        ];
    }

    public function getData(): CartProductData
    {
        $data = $this->validated();

        $data['user_id'] = 1; // hardcoded for now as no authentication is implemented
        $data['quantity'] = 1;

        return CartProductData::from($data);
    }
}
