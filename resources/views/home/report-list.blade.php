<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Reporte de Incidentes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ( $incidents as $incident )
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="m-6 p-6 text-gray-900 dark:text-gray-100">
                    <p>
                        <strong>{{$incident -> id}}</strong>
                        <a href="{{route('incident', $incident ->slug)}}">
                            {{$incident -> title }}
                        </a>
                        <br>
                        <span>{{$incident -> company -> name}}</span>
                    </p>
                </div>
            </div>
            @endforeach
            {{$incidents -> links()}}
        </div>

        

    </div>
</x-app-layout>
