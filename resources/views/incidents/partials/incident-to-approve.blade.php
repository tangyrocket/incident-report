<div class="p-6  shadow-md rounded-lg bg-gray-100">
    <h1 class="text-2xl font-bold mb-4">Acciones correctivas</h1>

    <div class="mb-4">
        <div class="list-disc list-inside mt-1 ml-5">
            @foreach ($incident->corrective_action as $action)
            <span>{{ $action->description }}</span>
            @endforeach
        </div>
    </div>


</div>
<div class="flex space-x-4 p-6  justify-end ">
    <form method="POST" action="{{ route('incident.update', $incident) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="incident_state_id" id="incidentStateId" value="5">
        <button type="submit" id="openModalBtn1" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded-md focus:outline-none focus:shadow-outline transition duration-300 ease-in-out">
            Rechazar
        </button>
    </form>
    <form method="POST" action="{{ route('incident.update', $incident) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="incident_state_id" id="incidentStateId" value="4">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded-md focus:outline-none focus:shadow-outline transition duration-300 ease-in-out">
            Aprobar
        </button>
    </form>
</div>
