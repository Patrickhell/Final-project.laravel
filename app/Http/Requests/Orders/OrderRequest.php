<?php

namespace App\Http\Requests\Orders;

use App\Rules\ValidProduct;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
      */
    public function rules()
    {
        return [
            'token' => ['required'],
            'product'=> [
                'required',
                new ValidProduct()
            ],
        ];
    }
}
