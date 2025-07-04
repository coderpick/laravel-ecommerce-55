<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $product = $this->route('product');
        return [
            'name' => 'required|string',
            'slug' => 'required|unique:products,slug,' . $product,
            'short_description' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'quantity' => 'required|numeric',
            'category' => 'required',
            'sub_category' => 'nullable',
            'brand' => 'required',
            'feature_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:1024',
            'status' => 'required',
            'is_featured' => 'required',
            'images' => 'nullable|array',
            'images.*' => 'mimes:jpeg,png,jpg,webp,svg|max:2048',
        ];
    }
}
