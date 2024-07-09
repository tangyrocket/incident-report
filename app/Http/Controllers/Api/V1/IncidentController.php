<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Incidents;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\V1\IncidentResource;
use App\Models\Corrective_action;
use App\Models\Incident_action;
use App\Models\Incident_cause;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $companyId = Auth::user()->company_id;
        $incidents = Incidents::where('company_id', $companyId)
                    ->whereIn('incident_state_id', [2, 5])
                    ->latest()
                    ->paginate();

        // Extrae solo los datos de la colección
        $data = IncidentResource::collection($incidents)->response()->getData(true)['data'];

        return response()->json($data);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'Usuario no autenticado'], Response::HTTP_UNAUTHORIZED);
        }


        $data = $request->all();

        $data['registered_user'] = $user->id;

        // Generar el slug combinando el título y una cadena aleatoria
        $data['slug'] = Str::slug($data['title'] . '-' . Str::random(2));
        $data['incident_state_id'] = 1;
        // Crear el incidente con los datos modificados
        $incident = Incidents::create($data);



        if (isset($data['cause_id']) && is_array($data['cause_id'])) {
            foreach ($data['cause_id'] as $causeId) {
                $incident_causes = [
                    'incident_id' => $incident->id,  // Usamos la PK del incidente como FK en la tabla relacionada
                    'cause_id' => $causeId,  // Campo relacionado
                ];

                // Crear el registro en la tabla relacionada
                Incident_cause::create($incident_causes);
            }
        }

        if (isset($data['action_id']) && is_array($data['action_id'])) {
            foreach ($data['action_id'] as $actionId) {
                $incident_action = [
                    'incident_id' => $incident->id,  // Usamos la PK del incidente como FK en la tabla relacionada
                    'action_id' => $actionId,  // Campo relacionado
                ];

                // Crear el registro en la tabla relacionada
                Incident_action::create($incident_action);
            }
        }

        return response()->json($incident, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Incidents $incident)
    {


       // return response()->json($incident, 200);
        return response()->json(new IncidentResource($incident), 200);
        //return new IncidentResource($incident);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Incidents $incident)
    {

        $data = $request->all();

        $incident->update([
            'incident_state_id' => 3,
        ]);

        $data['incident_id'] = $incident->id;

        Corrective_action::create($data);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incidents $incident)
    {
        //
    }
}
