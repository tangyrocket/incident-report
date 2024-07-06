<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Empresas') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8 max-w-7xl">
        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-lg overflow-hidden">
            <div class="p-6 sm:p-8">
                <h1 class="text-xl font-extrabold text-gray-900 dark:text-gray-100 mb-6">Editar Empresa</h1>

                <form action="{{ route('companies.update', $company) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nombre de la Empresa</label>
                        <input type="text" name="name" id="name" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-blue-200 dark:border-blue-600 dark:text-blue-200" value="{{ $company->name }}" required>
                    </div>

                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700 dark:text-blue-300 mb-2">Tipo de Empresa</label>
                        <select name="type" id="type" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md dark:bg-blue-200 dark:border-blue-600 dark:text-blue-200" required>
                            @foreach($types as $type)
                                <option value="{{ $type->type }}" {{ $company->type == $type->type ? 'selected' : '' }}>{{ $type->type }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center justify-end mt-6 space-x-3">
                        <a href="{{ route('companies.index') }}" class="bg-gray-300 hover:bg-gray-200 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center transition duration-300 ease-in-out">
                           Volver
                        </a>
                        <button type="submit" class="bg-gray-600 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded inline-flex items-center transition duration-300 ease-in-out">
                            Actualizar Empresa
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
