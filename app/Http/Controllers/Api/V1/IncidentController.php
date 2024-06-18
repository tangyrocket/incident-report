<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Incidents;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\V1\IncidentResource;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return IncidentResource::collection(Incidents::latest()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Incidents $incident)
    {
        return new IncidentResource($incident);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Incidents $incident)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incidents $incident)
    {
        //
    }
}
