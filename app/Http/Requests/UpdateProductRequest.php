<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_name' => 'required',
            'category_id' => 'required',
            // 'product_image' => 'required',
            'product_desc' => 'required',
            'product_quantity' => 'required|int',
            'sell_price' => 'required|int',
        ];
    }
}
