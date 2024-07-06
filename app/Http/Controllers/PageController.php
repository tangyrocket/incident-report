<?php

namespace App\Http\Controllers;

use App\Models\Incidents;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
        return view('auth.login');
    }
    public function dashboard()
    {
         //$incidents = Incidents::get();
         $incidents = Incidents::latest()->paginate(10);
        return view('home.report-list', ['incidents' => $incidents]);
    }

    public function dashboard_report()
    {
        // Obtener todos los incidentes
        $incidents = Incidents::with('company')->get();

        // Gráfico 1: Número de incidentes por empresa
        $incidentsByCompany = $incidents->groupBy('company.name')
            ->map->count()
            ->sortDesc();

        // Gráfico 2: Número de incidentes por mes
        $incidentsByMonth = $incidents->groupBy(function ($incident) {
            if ($incident->lifting_period && \Carbon\Carbon::hasFormat($incident->lifting_period, 'Y-m-d')) {
                return \Carbon\Carbon::parse($incident->lifting_period)->format('Y-m');
            }
            return 'Sin fecha';
        })
        ->map->count()
        ->sortKeys();


        // Gráfico 3: Tipos de incidentes
        $incidentArea = $incidents->groupBy('area.name')
            ->map->count()->sortKeys();

        // Gráfico 4: Estado de los incidentes
        $incidentStatus = $incidents->groupBy('incident_state.name')
            ->map->count()->sortKeys();

        // Preparar los datos para los gráficos
        $chartData = [
            'byCompany' => [
                'labels' => $incidentsByCompany->keys()->toArray(),
                'data' => $incidentsByCompany->values()->toArray(),
            ],
            'byMonth' => [
                'labels' => $incidentsByMonth->keys()->toArray(),
                'data' => $incidentsByMonth->values()->toArray(),
            ],
            'byType' => [
                'labels' => $incidentArea->keys()->toArray(),
                'data' => $incidentArea->values()->toArray(),
            ],
            'byStatus' => [
                'labels' => $incidentStatus->keys()->toArray(),
                'data' => $incidentStatus->values()->toArray(),
            ],
        ];

        return view('pages.dashboard_reporte', compact('chartData'));
    }



    public function reports()
    {
        //$incidents = Incidents::get();
        $incidents = Incidents::latest()->paginate(10);

        return view('home.report-list', ['incidents' => $incidents]);
    }
    public function incident(Incidents $incident)
    {
        return view('incidents.incident', ['incident' => $incident]);
    }

    public function incident_correction(Incidents $incident)
    {
        return view('incidents.incident-correction', ['incident' => $incident]);
    }
}
