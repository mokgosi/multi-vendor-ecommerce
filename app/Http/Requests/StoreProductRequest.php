<?php

namespace App\Http\Requests;

use App\Enums\ProductStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug',
            'description' => 'required|string',
            'details' => 'required|string',
            'thumbnail_url' => 'nullable|url',
            'price' => 'required|numeric|min:0',
            'cost_price' => 'required|numeric|min:0',
            'inventory' => 'required|integer|min:0',
            'discount_percent' => 'nullable|integer|min:0|max:100',
            'status' => ['required', 'string', Rule::enum(ProductStatusEnum::class)],
            // Or using the allStatuses method
            //'status' => 'required|string|in:' . implode(',', \App\Enums\ProductStatusEnum::allStatuses()),
            'department_id' => 'required|exists:departments,id',
            'category_id' => 'required|exists:categories,id',

            'is_returnable' => 'boolean',
            'is_digital' => 'boolean',
            'is_taxable' => 'boolean',
            'is_shippable' => 'boolean',
            'is_active' => 'boolean',
            'is_reviewable' => 'boolean',
            'is_featured' => 'boolean',

            'tax_rate' => 'required|numeric|min:0',
            'security_stock' => 'required|integer|min:0',
            'sku' => 'nullable|string|unique:products,sku',
            'barcode' => 'nullable|string|unique:products,barcode',
            'weight' => 'required|numeric|min:0',
        ];
    }
}
