<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-900">
        <header class="no-print bg-white dark:bg-gray-800 shadow-md">
            <div class="max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <h2 class=" font-semibold text-xl font-bold text-gray-900 dark:text-white leading-tight">
                    Detalle de Incidente
                </h2>
         
                <div class="flex space-x-4">
                    @if ($incident->incident_state->id == 4)
                    @include('incidents.partials.button-resolved')
                    @endif
                    <a href="{{ route('reportes') }}" class="inline-flex items-center px-3 py-2 bg-gray-800 text-white font-semibold rounded-lg shadow-md hover:bg-gray-700 transition duration-150 ease-in-out">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Regresar
                    </a>
                </div>
            </div>
        </header>

        <main class="py-6 print">
            <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 shadow-xl rounded-lg overflow-hidden">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Datos del Incidente</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach ([
                            'Título' => $incident->title,
                            'Unidad de Negocio' => $incident->bussiness_unit->name,
                            'Servicio Eléctrico' => $incident->electrical_service->name,
                            'Fecha de Registro' => $incident->created_at->format('d/m/Y H:i'),
                            'Empresa Reportada' => $incident->company->name,
                            'Área' => $incident->area->name,
                            'Locación' => $incident->location,
                            'Actividad' => $incident->activity,
                            'Evento' => $incident->event->code
                            ] as $label => $value)
                            <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-4 shadow-sm">
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">{{ $label }}</h3>
                                <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $value }}</p>
                            </div>
                            @endforeach
                        </div>

                        <div class="mt-8">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Descripción del Incidente</h3>
                            <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-4 shadow-sm">
                                <p class="text-gray-800 dark:text-gray-200">{{ $incident->description }}</p>
                            </div>
                        </div>

                        <div class="mt-8">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Estado del Incidente</h3>
                            <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-4 shadow-sm flex items-center justify-between">
                                <span class="text-lg font-medium text-gray-700 dark:text-gray-300">Estado actual:</span>
                                <span class="px-4 py-2 rounded-full text-sm font-medium bg-{{ $incident->incident_state->color }}-100 text-{{ $incident->incident_state->color }}-800">
                                    {{ $incident->incident_state->name }}
                                </span>
                            </div>
                        </div>

                        <div class="mt-8">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Usuarios Involucrados</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @foreach ([
                                'Usuario Reportado' => $incident->reported->email,
                                'Usuario que Reporta' => $incident->registered->email
                                ] as $label => $value)
                                <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-4 shadow-sm">
                                    <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">{{ $label }}</h4>
                                    <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $value }}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mt-8 no-print">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Acciones</h3>
                            @if ($incident->incident_state->id == 1)
                            @include('incidents.partials.incident-modal-lifting')
                            @elseif ($incident->incident_state->id == 2)
                            @include('incidents.partials.incident-pending')
                            @elseif ($incident->incident_state->id == 3)
                            @include('incidents.partials.incident-to-approve')
                            @elseif ($incident->incident_state->id == 4)
                            @include('incidents.partials.incident-resolved')
                            @else
                            @include('incidents.partials.incident-lifting-declined')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
