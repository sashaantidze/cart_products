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
            //'quantity' => 'required|integer|min:1,max:10',
        ];
    }

    public function getData(): CartProductData
    {
        $data = $this->validated();

        $data['user_id'] = 1;
        $data['quantity'] = 1;

        return CartProductData::from($data);
    }
}
