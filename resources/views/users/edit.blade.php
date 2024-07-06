<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8 max-w-7xl">
        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-lg overflow-hidden">
            <div class="p-6 sm:p-8">
                <h1 class="text-xl font-extrabold text-gray-900 dark:text-gray-100 mb-6">Editar Usuario</h1>

                <form action="{{ route('users.update', $user) }}" method="POST" id="updateUserForm">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="company" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Empresa</label>
                            <select name="company" id="company" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                                @foreach($companies as $company)
                                <option value="{{ $company->id }}" {{ $user->company_id == $company->id ? 'selected' : '' }}>
                                    {{ $company->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nombre</label>
                            <input type="text" name="name" id="name" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200" value="{{ old('name', $user->person->name) }}" required>
                        </div>

                        <div>
                            <label for="lastname" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Apellido</label>
                            <input type="text" name="lastname" id="lastname" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200" value="{{ old('lastname', $user->person->lastname) }}" required>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Correo Electrónico</label>
                            <input type="email" name="email" id="email" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nueva Contraseña (dejar en blanco para no cambiar)</label>
                            <input type="password" name="password" id="password" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Confirmar Nueva Contraseña</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end space-x-3">
                        <a href="{{ route('users.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center transition duration-300 ease-in-out">
                            Volver
                        </a>
                        <button type="submit" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded inline-flex items-center transition duration-300 ease-in-out">
                          Actualizar Usuario
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if ($errors->any())
    <div class="container mx-auto mt-4">
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">¡Oops!</strong>
            <span class="block sm:inline">Por favor, corrige los siguientes errores:</span>
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('updateUserForm');
        const passwordField = document.getElementById('password');
        const confirmPasswordField = document.getElementById('password_confirmation');

        form.addEventListener('submit', function(event) {
            if (passwordField.value !== '') {
                if (confirmPasswordField.value === '') {
                    event.preventDefault();
                    alert('Por favor, confirme la nueva contraseña.');
                } else if (passwordField.value !== confirmPasswordField.value) {
                    event.preventDefault();
                    alert('Las contraseñas no coinciden.');
                }
            }
        });
    });
    </script>
</x-app-layout>
