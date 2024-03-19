<?php

namespace App\Http\Controllers;

use App\Http\Resources\PhoneResource;
use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response([PhoneResource::collection((Phone::all()))],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        return response([new PhoneResource(Phone::create($request->all()))],201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Phone $phone)
    {
        //
        return response([new PhoneResource($phone)],200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Phone $phone)
    {
        //
        new PhoneResource($phone->update($request->all()));
        return [
            'message' => "UPDATED",
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Phone $phone)
    {
        //
        $phone->delete();
        return response()->noContent();
    }
}
