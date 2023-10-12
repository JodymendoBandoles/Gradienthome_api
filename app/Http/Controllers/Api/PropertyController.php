<?php

namespace App\Http\Controllers\Api;

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
        $properties = Property::all();
        
       return PropertyResource::collection(Property::paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        return PropertyResource::make($property);
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
