<x-app-layout>
    <x-slot name="head">
        <a href="{{ route('reportes')}}" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100">
            {{ __('<--Regresar a reportes')}}
        </a>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-gray-100">
            <h1>TITULO</h1>
            <h2>{{$incident -> title}}</h2>
            <BR></BR>

            <h1>DESCRPICION</h1>
            <p>
                {{$incident -> description}}
            </p>
            <BR></BR>
            <h1>ACTIVIDAD</h1>
            <h2>{{$incident -> activity}}</h2>
            <BR> </BR>
            <h1>LOCACION</h1>
            <h2>{{$incident -> location}}</h2>
            <BR></BR>
            <h1>USUARIO REPORTADO</h1>
            <h2>{{$incident -> reported -> email }}</h2>
            <BR></BR>
            <h1>USUARIO QUE REPORTA</h1>
            <h2>{{$incident -> registered -> email }}</h2>
            <BR></BR>
            <h1>FECHA DE REGISTRO</h1>
            <h2>{{$incident -> created_at}}</h2>
            <BR></BR>
            <h1>EMPRESA REPORTADA</h1>
            <h2>*{{$incident -> company -> name}}</h2>
            <BR></BR>
            <h1>UNIDAD DE NEGOCIO</h1>
            <h2>{{$incident -> bussiness_unit -> name}}</h2>
            <BR></BR>
            <h1>SERVICIO ELECTRICO</h1>
            <h2>{{$incident -> electrical_service -> name}}</h2>
            <BR></BR>
            <h1>AREA</h1>
            <h2>*{{$incident -> area -> name}}</h2>
            <BR></BR>
            <h1>EVENTO</h1>
            <h2>{{$incident -> event-> code}}</h2>
            <BR></BR>
            <h1>ESTADO DEL INCIDENTE</h1>
            <h2>*{{$incident -> incident_state -> name}}</h2>
            <BR></BR>
            <h1>ACCIONES CORRECTIVAS</h1>
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
