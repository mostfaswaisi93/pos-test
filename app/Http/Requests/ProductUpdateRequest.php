<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $product_id = $this->route('product')->id;
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
            'barcode' => 'required|string|max:50|unique:products,barcode,' . $product_id,
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'quantity' => 'required|integer',
            'status' => 'required|boolean',
        ];
    }
}
