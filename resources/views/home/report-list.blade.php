<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Reporte de Incidentes') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($incidents as $incident)
            @php
            switch ($incident->incident_state_id) {
            case 1:
            $CardClass = 'card-new';
            break;
            case 2:
            $CardClass = 'card-pending';
            break;
            case 3:
            $CardClass = 'card-pending';
            break;
            case 4:
            $CardClass = 'card-approved';
            break;
            default:
            $CardClass = 'bg-blue-500 hover:bg-blue-700';
            }
            @endphp
            <div class="p-6 mb-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-l-4 {{ $CardClass }} ">
                <div class="text-gray-900 dark:text-gray-100 grid grid-cols-5 gap-4">
                    <div class="col-span-4">
                        <strong>{{ $incident->id }}</strong>
                        <span>{{ $incident->title }}</span>
                        <br>
                        <span>{{ $incident->company->name }}</span>
                        <span>{{ $incident->incident_state_id }}</span>
                    </div>
                    <div class="">

                        <a href="{{ route('incident', $incident->slug) }}">
                            <button class="bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300 ease-in-out">{{ __('Ver') }}</button>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            {{ $incidents->links() }}
        </div>
    </div>
</x-app-layout>
