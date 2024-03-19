<?php

namespace App\Http\Controllers;

use App\Http\Resources\StateResource;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response([StateResource::collection(State::all())],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        return response([new StateResource(State::create($request->all()))],201);

    }

    /**
     * Display the specified resource.
     */
    public function show(State $state)
    {
        //
        return response([new StateResource($state)],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, State $state)
    {
        //
        new StateResource($state->update($request->all()));
        return [
            'message' => "UPDATED",
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        //
        $state->delete();
        return response()->noContent();
    }
}
