<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Bussiness_unit;
use App\Models\Electrical_service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\V1\IncidentResource;
use App\Models\Area;
use App\Models\Company;
use App\Models\Corrective_action;
use App\Models\Event;
use App\Models\Incident_action;
use App\Models\Incident_cause;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DataController extends Controller
{
    public function ueData()
    {
        $data = Bussiness_unit::select('id', 'name')->get();


        return response()->json($data);

    }

    public function seData()
    {

        $data = Electrical_service::select('id', 'name')->get();


        return response()->json($data);

    }

    public function areaData()
    {
        $data = Area::select('id', 'name')->get();


        return response()->json($data);

    }
    public function eventoData()
    {
        $data = Event::select('id', 'name')->get();


        return response()->json($data);
    }

    public function empresaData(Request $request)
    {
        $type = $request->query('type');

        $data = Company::where('type', $type)->get();

        return response()->json($data);
    }

    public function personalData(Request $request)
    {
        $type = $request->query('companyId');

        $data = User::where('company_id', $type)->get();

        return response()->json($data);
    }
}
