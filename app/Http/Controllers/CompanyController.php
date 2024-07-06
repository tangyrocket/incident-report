<?php
namespace App\Http\Controllers;

use App\Models\Companies;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $query = Company::withCount(['users', 'incidents']);

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('type', 'like', '%' . $request->search . '%');
        }

        $companies = $query->paginate(10);
        $types = Company::select('type')->distinct()->get(); // Obtener tipos únicos

        return view('companies.index', compact('companies', 'types'));
    }

    public function create()
    {
        $types = Company::select('type')->distinct()->get(); // Obtener tipos únicos
        return view('companies.create', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);

        Company::create($request->all());

        return redirect()->route('companies.index')->with('success', 'Empresa creada con éxito.');
    }

    public function edit(Company $company)
    {
        $types = Company::select('type')->distinct()->get(); // Obtener tipos únicos
        return view('companies.edit', compact('company', 'types'));
    }

    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);

        $company->update($request->all());

        return redirect()->route('companies.index')->with('success', 'Empresa actualizada con éxito.');
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Empresa eliminada con éxito.');
    }

    public function deactivate(Companies $company)
    {
        $company->update(['active' => false]);
        return redirect()->route('companies.index')->with('success', 'Empresa desactivado con éxito.');
    }

}
