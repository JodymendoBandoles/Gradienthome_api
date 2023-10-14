<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyUpdateRequest extends FormRequest
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
            'image_url' => 'sometimes|required|url',
            'property_name' => 'sometimes|required|string',
            'country' => 'sometimes|required|string',
            'province' => 'sometimes|required|string',
            'city' => 'sometimes|required|string',
            'barangay' => 'sometimes|required|string',
            'street_name' => 'sometimes|required|string',
            'block_number' => 'sometimes|required|string',
            'lot_number' => 'sometimes|required|string',
            'price_per_month' => 'sometimes|required|numeric',
            'total_contract_price' => 'sometimes|required|numeric',
            'lot_area' => 'sometimes|required|numeric',
            'listing_status' => 'sometimes|required|in:available,sold',
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