<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'image_url' => $this->image_url,
            'property_name' => $this->property_name,
            'users_id' => $this->users_id,
            'country' => $this->country,
            'province' => $this->province,
            'city' => $this->city,
            'barangay' => $this->barangay,
            'street_name' => $this->street_name,
            'block_number' => $this->block_number,
            'lot_number' => $this->lot_number,
            'price_per_month' => $this->price_per_month,
            'total_contract_price' => $this->total_contract_price,
            'lot_area' => $this->lot_area,
            'listing_status' => $this->listing_status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}