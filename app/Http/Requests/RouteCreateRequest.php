<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RouteCreateRequest extends FormRequest
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
            'user' => 'required|exists:users,public_id',
            'shop_id' => 'required|exists:shops,cui',
            'ceil' => 'required|numeric|min:1|max:4',
            'payment_due' => 'required|numeric|min:1|max:2'
        ];
    }
}
