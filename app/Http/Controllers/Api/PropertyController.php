<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\PropertyStoreRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Http\Resources\PropertyResource;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  
    public function index(Request $request)
    {
        $query = Property::query();

        if ($request->has('province')) {
            $query->where('province', $request->input('province'));
        }

        
        if ($request->has('city')) {
            $query->where('city', $request->input('city'));
        }

        if ($request->has('barangay')) {
            $query->where('barangay', $request->input('barangay'));
        }

        if ($request->has('street_name')) {
            $query->where('street_name', $request->input('street_name'));
        }

        if ($request->has('property_name')) {
            $query->where('property_name', 'LIKE', '%'.$request->input('property_name').'%');
        }


    
        $filteredProperties = $query->get();
       
        return PropertyResource::collection($filteredProperties);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(PropertyStoreRequest $request)
    {
        $property = Property::create([
                'image_url' => $request->image_url,
                'property_name' => $request->property_name, 
                'country' => $request->country,
                'province' => $request->province,
                'city' => $request->city,
                'barangay' => $request->barangay,
                'street_name' => $request->street_name,
                'block_number' => $request->block_number,
                'lot_number' => $request->lot_number,
                'price_per_month' => $request->price_per_month,
                'total_contract_price' => $request->total_contract_price,
                'lot_area' => $request->lot_area,
                'listing_status' => $request->listing_status,
            ]);

            $property->users_id = auth()->users()->id;

            $property->save();

            return new RecipeResource($property);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        return new PropertyResource($property);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
