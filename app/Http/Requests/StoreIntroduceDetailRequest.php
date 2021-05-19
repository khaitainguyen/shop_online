<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIntroduceDetailRequest extends FormRequest
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
            'detail_name' => 'required',
            'detail_desc' => 'required',
            'introduce_id' => 'required|int',
            'detail_image' => 'required'
        ];
    }
}
