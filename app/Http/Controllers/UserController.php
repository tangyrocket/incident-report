<?php

namespace App\Http\Controllers;

use App\Models\Incidents;
use App\Http\Controllers\Controller;
use App\Models\Companies;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Person;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Database\Eloquent\Relations\HasRelationships;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::with(['person', 'company']); // Asegúrate de que los nombres de las relaciones sean correctos

        if ($request->filled('search')) {
            $query->whereHas('person', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%');
            })->orWhere('email', 'like', '%' . $request->search . '%');
        }

        $users = $query->paginate(10);

        return view('users.index', compact('users'));
    }

    public function indexa(Request $request)
    {
        $query = User::where('active', true);

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        $users = $query->paginate(10);

        return view('users.index', compact('users'));
    }


    public function create()
    {

        $companies = Companies::all();
        return view('users.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',

            'email' => 'required|string|email|max:255|unique:users',
            'company' => 'required|exists:companies,id', // Valida que el ID de la compañía exista
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        DB::transaction(function () use ($request) {
            $person = Person::create([
                'name' => $request->name,
                'lastname' => $request->lastname,
            ]);

            User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'person_id' => $person->id,
                'company_id' => $request->company,
            ]);
        });

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        $companies = Companies::all(); // Obtener todas las compañías para el select
        return view('users.edit', compact('user', 'companies'));
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'company' => 'required|exists:companies,id',  // Cambiado de company_id a company
        ]);

        DB::transaction(function () use ($request, $user) {
            // Actualizar la persona
            $user->person->update([
                'name' => $request->name,
                'lastname' => $request->lastname,
            ]);

            // Actualizar el usuario
            $user->update([
                'email' => $request->email,
                'company_id' => $request->company,  // Cambiado de company_id a company
            ]);

            // Actualizar la contraseña si se proporciona
            if ($request->filled('password')) {
                $user->update(['password' => Hash::make($request->password)]);
            }
        });

        return redirect()->route('users.index')->with('success', 'Usuario actualizado con éxito.');
    }



    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado.');
    }

    public function deactivate(User $user)
    {
        $user->update(['active' => false]);
        return redirect()->route('users.index')->with('success', 'Usuario desactivado con éxito.');
    }


}
