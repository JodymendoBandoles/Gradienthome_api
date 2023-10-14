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

        $property->users_id = auth()->user()->id;
        $property->save();

        return new PropertyResource($property);
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
    public function update(PropertyUpdateRequest $request, Property $property)
    {
        if (isset($request->image_url)) {
            $property->image_url = $request->image_url;
        }
    
        if (isset($request->property_name)) {
            $property->property_name = $request->property_name;
        }
    
        if (isset($request->country)) {
            $property->country = $request->country;
        }
    
        if (isset($request->province)) {
            $property->province = $request->province;
        }
    
        if (isset($request->city)) {
            $property->city = $request->city;
        }
    
        if (isset($request->barangay)) {
            $property->barangay = $request->barangay;
        }
    
        if (isset($request->street_name)) {
            $property->street_name = $request->street_name;
        }
    
        if (isset($request->block_number)) {
            $property->block_number = $request->block_number;
        }
    
        if (isset($request->lot_number)) {
            $property->lot_number = $request->lot_number;
        }
    
        if (isset($request->price_per_month)) {
            $property->price_per_month = $request->price_per_month;
        }
    
        if (isset($request->total_contract_price)) {
            $property->total_contract_price = $request->total_contract_price;
        }
    
        if (isset($request->lot_area)) {
            $property->lot_area = $request->lot_area;
        }
    
        if (isset($request->listing_status)) {
            $property->listing_status = $request->listing_status;
        }

        // Save the property after making any changes
        $property->save();
        return new PropertyResource($property);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();

        return response()->json([
            'success' =>true,
            'message' => 'Successfully deleted'
        ]);
    }
}
