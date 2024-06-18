<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Incidents;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\V1\IncidentResource;
use Illuminate\Support\Str;
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


        $data = $request->all();

        // Generar el slug combinando el título y una cadena aleatoria
        $data['slug'] = Str::slug($data['title'] . '-' . Str::random(2));
        $data['incident_state_id'] = 1;
        // Crear el incidente con los datos modificados
        $incident = Incidents::create($data);

        return response()->json($incident, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Incidents $incident)
    {
        return response()->json($incident, 200);
        //return new IncidentResource($incident);
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
