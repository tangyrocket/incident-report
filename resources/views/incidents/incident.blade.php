<x-app-layout>
    <x-slot name="head">
        <a href="{{ route('reportes')}}" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100">
            {{ __('<--Regresar a reportes')}}
        </a>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1>{{$incident -> title}}</h1>
            <p>
                {{$incident -> description}}
            </p>
            <h2>{{$incident -> activity}}</h2>
            <h2>{{$incident -> location}}</h2>
            <h2>{{$incident -> reported -> email }}</h2>
            <h2>{{$incident -> registered -> email }}</h2>
            <h2>{{$incident -> created_at}}</h2>
            <h2>*{{$incident -> company -> name}}</h2>
            <h2>{{$incident -> bussiness_unit -> name}}</h2>
            <h2>{{$incident -> electrical_service -> name}}</h2>
            <h2>*{{$incident -> area -> name}}</h2>
            <h2>{{$incident -> event-> code}}</h2>
            <h2>*{{$incident -> incident_state -> name}}</h2>

            <h3>Corrective Actions</h3>
            <ul>
                @foreach ($incident->corrective_action as $action)
                <li>{{ $action->id }}</li>
                @endforeach
            </ul>
        </div>
    </div>


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

    
</x-app-layout>
