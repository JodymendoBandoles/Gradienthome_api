<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyStoreRequest extends FormRequest
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
            'image_url' => 'required|url',
            'property_name' => 'required|string',
            'country' => 'required|string',
            'province' => 'required|string',
            'city' => 'required|string',
            'barangay' => 'required|string',
            'street_name' => 'required|string',
            'block_number' => 'required|string',
            'lot_number' => 'required|string',
            'price_per_month' => 'required|numeric',
            'total_contract_price' => 'required|numeric',
            'lot_area' => 'required|numeric',
            'listing_status' => 'required|in:available,sold',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpRespondException(respond()->json([
            'success' => false,
            'message' => 'validation errors',
            'data' => $validator->errors(),
        ]));
            
    }
}
