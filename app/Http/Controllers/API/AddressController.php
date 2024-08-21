<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $address = Address::with(['user'])->get();

        return response()->json($address);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|max:100',
            'postal_code' => 'required|max:100',
            'city' => 'required|max:100',
        ]);

        $address = Address::create($request->all());

        return response()->json([
            'status' => 'Success',
            'data' => $address,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        return response()->json($address);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Address $address)
    {
        $request->validate([
            'address' => 'required|max:100',
            'postal_code' => 'required|max:100',
            'city' => 'required|max:100',
        ]);

        $address->update($request->all());

        return response()->json([
            'status' => 'Mise à jour avec succèss'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        $address->delete();

        return response()->json([
            'status' => 'Supprimer avec succès avec succèss'
        ]);
    }
}
