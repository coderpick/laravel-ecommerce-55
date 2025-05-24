<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandUpdateRequest extends FormRequest
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
        $id = $this->route('brand');
        return [
            'name' => 'required',
            'slug' => 'required|unique:brands,slug,' . $id,
            'logo' => 'nullable|mimes:png,jpg,jpeg,webp|max:1024',
        ];
    }
}
