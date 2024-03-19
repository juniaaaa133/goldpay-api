<?php

namespace App\Http\Controllers;

use App\Http\Resources\NumberResource;
use App\Models\Accountnumber;
use Illuminate\Http\Request;

class NumberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response([NumberResource::collection(Accountnumber::all())],200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        return response([new NumberResource(Accountnumber::create($request->all()))],201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Accountnumber $accountnumber)
    {
        //
        return response([new NumberResource($accountnumber)],200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Accountnumber $accountnumber)
    {
        //
        new NumberResource($accountnumber->update($request->all()));
        return [
            'message' => "UPDATED",
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Accountnumber $accountnumber)
    {
        //
        $accountnumber->delete();
        return response()->noContent();
    }
}
