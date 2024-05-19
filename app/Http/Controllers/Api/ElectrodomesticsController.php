<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Electrodomestic;
use Illuminate\Http\Request;

class ElectrodomesticsController extends Controller
{
    // GET
    // curl -v http://localhost:8000/api/electrodomestics
    function index()
    {
        $electrodomestics = Electrodomestic::all();

        if (!$electrodomestics) {
            return response()->json([
                'message' => 'No electrodomestics found'
            ], 404);
        }

        return response()->json([
            'data' => $electrodomestics,
            'message' => 'electrodomestics found successfully.',
        ], 200);
    }

    // GET
    function create() {}

    // POST
    function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'price' => 'required|numeric',
                'image' => 'required|url',
                'description' => 'required',
                'category' => 'required',
                'brand' => 'required',
            ]);

            $electrodomestic = Electrodomestic::create($validatedData);

            return response()->json([
                'message' => 'Electrodomestic created successfully',
                'data' => $electrodomestic
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error creating electrodomestic',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // GET
    function show($id)
    {
        return Electrodomestic::where('id', $id)->get();
    }

    // GET
    // PUT, PATCH

    function update(Request $request, $id){
        try {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'price' => 'required|numeric',
                'image' => 'required|max:255',
                'description' => 'required|max:255',
                'category' => 'required|max:255',
                'brand' => 'required|max:255',
            ]);

            $electrodomestic = Electrodomestic::findOrFail($id);
            $electrodomestic->update($validatedData);

            var_dump($electrodomestic);

            return response()->json([
                'message' => 'Electrodomestic updated successfully',
                'data' => $electrodomestic
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error updating electrodomestic',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // DELETE
    function destroy($id){
        try {
            $electrodomestic = Electrodomestic::findOrFail($id);
            $electrodomestic->delete();

            return response()->json([
                'message' => 'Electrodomestic deleted successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error deleting electrodomestic',
                'error' => $e->getMessage()
            ], 500);
        }
    }

}
