<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {

        return [
            'name' => 'required|max:30|min:5|unique:products,name,' . $this->product->id,
            'description' => 'required|max:50|min:10',
            'price' => 'required|numeric|gt:0',
            'quantity' => 'required|numeric|gt:0',
            'image' => 'image|max:4000',
            'category_id' => 'required|numeric|gt:0|exists:categories,id',
        ];
    }
}
