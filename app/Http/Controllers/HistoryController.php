<?php

namespace App\Http\Controllers;

use App\Http\Resources\HistoryResource;
use App\Models\Transferhistory;
use Illuminate\Http\Request;
use Psy\Command\HistoryCommand;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response([HistoryResource::collection(Transferhistory::all())],200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        return response([new HistoryCommand(Transferhistory::create($request->all()))],201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Transferhistory $transferhistory)
    {
        //
        return response([new HistoryResource($transferhistory)],200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transferhistory $transferhistory)
    {
        //
        new HistoryResource($transferhistory->update($request->all()));
        return [
            'message' => "UPDATED",
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transferhistory $transferhistory)
    {
        //
        $transferhistory->delete();
        return response()->noContent();
    }
}
