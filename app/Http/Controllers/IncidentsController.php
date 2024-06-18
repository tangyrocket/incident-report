<?php

namespace App\Http\Controllers;

use App\Models\Incidents;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class IncidentsController extends Controller
{
    public function corrective_action($id)
    {
        // Buscar el incidente por su ID
        $incident = Incidents::findOrFail($id);

        // Acceder a las acciones correctivas relacionadas
        $correctiveActions = $incident->corrective_action;

        // Extraer las descripciones
        $descriptions = $correctiveActions->pluck('description');

        // Devolver una vista con las descripciones, por ejemplo
        return view('incidents.show', compact('incident', 'descriptions'));
    }


    public function update(Request $request, Incidents $incident)
    {
        // Validar los datos recibidos
        $incident->update([
            'incident_state_id' => 2,
            'lifting_period' => $request->lifting_period,
        ]);

        return redirect()->back()->with('status', 'Incident state updated successfully!');
    }
}
