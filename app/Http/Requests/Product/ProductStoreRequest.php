<?php

namespace App\Http\Requests\Product;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProductStoreRequest extends FormRequest
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
            'name' => [
                'required',
            ],
            'category_id' => [
                'required',
                Rule::exists('categories', 'id')
            ],
            'price' => [
                'required',
                'integer',
            ],
            'stock' => [
                'required',
                'integer',
            ],
        ];
    }

    /**
     * @inheritDoc
     */
    public function attributes()
    {
        return Product::$labels;
    }
}
