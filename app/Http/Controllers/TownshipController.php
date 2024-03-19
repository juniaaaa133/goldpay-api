<?php

namespace App\Http\Controllers;

use App\Http\Resources\TownshipResource;
use App\Models\Township;
use Illuminate\Http\Request;

class TownshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response([TownshipResource::collection(Township::all())],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        return response([new TownshipResource(Township::create($request->all()))],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Township $township)
    {
        //
        return response([new TownshipResource($township)],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Township $township)
    {
        //
        new TownshipResource($township->update($request->all()));
        return [
            'message' => "UPDATED",
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Township $township)
    {
        //
        $township->delete();
        return response()->noContent();
    }
}
