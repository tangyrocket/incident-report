<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Reporte de Incidentes') }}
        </h2>
    </x-slot>

    <div class="py-6" id="incidentContainer">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Selector de filtro por estado -->
            <div class="mb-4">
                <label for="filterState" class="block text-sm font-medium text-gray-700">Filtrar por Estado:</label>
                <select id="filterState" name="filterState" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none  sm:text-sm">
                    <option value="">Todos</option>
                    <option value="1">Nuevo</option>
                    <option value="2">Pendiente</option>
                    <option value="3">En proceso</option>
                    <option value="4">Aprobado</option>
                    <option value="5">Rechazado</option>
                </select>
            </div>

            <!-- Lista de incidentes -->
            @foreach ($incidents as $incident)
            @php
            switch ($incident->incident_state_id) {
            case 1:
            $CardClass = 'card-new';
            $spanCard = 'span-new';
            break;
            case 2:
            case 3:
            $CardClass = 'card-pending';
            $spanCard = 'span-pending';
            break;
            case 4:
            $CardClass = 'card-approved';
            $spanCard = 'span-approved';
            break;
            default:
            $CardClass = 'card-declined';
            $spanCard = 'span-declined';
            }
            @endphp
            <div class="p-6 mb-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-l-4 {{ $CardClass }} hover:shadow-xl transition-shadow duration-300 ease-in-out card-container" data-incident-state-id="{{ $incident->incident_state_id }}">
                <div class="text-gray-900 dark:text-gray-100 grid grid-cols-8 gap-4 items-center">
                    <div class="col-span-5 pl-4">
                        <span class="text-xl font-bold">{{ $incident->title }}</span>
                        <br>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">{{ $incident->company->name }}</p>
                    </div>
                    <div class="col-span-2 flex flex-col items-center pl-4 justify-center">
                        <span class="px-4 py-2 rounded-full text-xs font-semibold tracking-wide {{ $spanCard }}">
                            {{ $incident->incident_state->name }}
                        </span>
                    </div>
                    <div class="col-span-1 flex justify-center">
                        <a href="{{ route('incident', $incident->slug) }}">
                            <button class="hover:bg-blue-500 bg-blue-500 text-white font-bold py-2 px-8 focus:outline-none focus:shadow-outline transition duration-300 ease-in-out btn-card">{{ __('Ver') }}</button>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            {{ $incidents->links() }}
        </div>
    </div>
</x-app-layout>

<!-- Agrega este script al final de tu página, justo antes de cerrar la etiqueta </body> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#filterState').change(function() {
            const selectedState = $(this).val(); // Obtener el valor seleccionado

            $('#incidentContainer .card-container').each(function() {
                const incidentState = $(this).data('incident-state-id');

                if (selectedState === '' || incidentState.toString() === selectedState) {
                    $(this).show(); // Mostrar el incidente si coincide con el filtro
                } else {
                    $(this).hide(); // Ocultar el incidente si no coincide
                }
            });
        });
    });
</script>
