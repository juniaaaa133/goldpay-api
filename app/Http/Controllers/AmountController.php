<?php

namespace App\Http\Controllers;

use App\Http\Resources\AmountResource;
use App\Models\Amount;
use Illuminate\Http\Request;

class AmountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response([AmountResource::collection(Amount::all())],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        return response([new AmountResource(Amount::create($request->all()))],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Amount $amount)
    {
        //
        return response([new AmountResource($amount)],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Amount $amount)
    {
        //
        new AmountResource($amount->update($request->all()));
        return [
            'message' => "UPDATED",
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Amount $amount)
    {
        //
        $amount->delete();
        return response()->noContent();
    }
}
