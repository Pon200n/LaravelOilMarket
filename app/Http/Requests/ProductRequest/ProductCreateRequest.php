<?php

namespace App\Http\Requests\ProductRequest;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
        return [
            'name' => ['required', "string"],
            'price' => ['required', "integer"],
            'brand_id' => ['required', "integer"],
            'category_id' => ['required', "integer"],
            // 'values' => ['nullable', 'array'],
            // 'file' => ['required', "image"],
        ];
    }
}
