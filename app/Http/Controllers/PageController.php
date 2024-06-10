<?php

namespace App\Http\Controllers;

use App\Models\Incidents;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }
    public function dashboard()
    {
        return view('dashboard');
    }
    public function reports()
    {
        //$incidents = Incidents::get();
        $incidents = Incidents::latest()->paginate();

        return view('home.report-list', ['incidents' => $incidents]);
    }
    public function incident(Incidents $incident)
    {
        return view('incidents.incident', ['incident' => $incident]);
    }
}
