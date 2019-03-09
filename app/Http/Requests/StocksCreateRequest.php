<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StocksCreateRequest extends FormRequest
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
            'name' => 'required|alpha_num',
            'category__id' => 'required|exists:types,id',
            'product_id' => 'required|exists:products,id',
            'price' => 'required',
            'lot' => 'required',
            'qty' => 'required|min:1',
            'product' => 'required'
        ];
    }
}
