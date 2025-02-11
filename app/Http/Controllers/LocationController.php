<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller{
    public function index(Request $request)
    {
   $filters = $request->only(['country']);

            $locations = Location::query()
                ->filter($filters)
                ->get();

        return response()->json([
            'success' => true,
            'status_code'=> 200,
            'data' => $locations,
        ]);
    }


    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'country' => 'required|string|max:255',
            'district' => 'nullable|string',
            'village' => 'required|string|max:255', // Fixed: Changed `decimal` to `string`
            'image_url' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        // Create the location
        $location = Location::create($validator->validated());

        // Return a JSON response
        return response()->json([
            'success' => true,
            'message' => 'Location created successfully.',
            'data' => $location,
        ], 201);
    }
}