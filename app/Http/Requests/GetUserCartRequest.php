<?php

namespace App\Http\Requests;

use App\Data\CartProductData;
use Illuminate\Foundation\Http\FormRequest;

class GetUserCartRequest extends FormRequest
{
    public function rules(): array
    {
        return [];
    }

    public function getData(): CartProductData
    {
        $data = $this->validated();

        $data['user_id'] = 2; // hardcoded userid, assume this is auth user

        return CartProductData::from($data);
    }
}
