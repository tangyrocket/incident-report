<div class="container mx-auto p-8 bg-gray-100">
    <!-- Botón para abrir el modal -->
    <button id="openModalLifting" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">
        Cambiar fecha de subsanación
    </button>
</div>

<!-- Modal -->
<div id="modalLifting" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-11/12 md:w-1/2 lg:w-1/3">
        <div class="p-8">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Cambiar fecha de subsanación</h2>
            <form method="POST" action="{{ route('incident.update', $incident) }}" class="bg-white rounded-lg">
                @csrf
                @method('PUT')

                <input type="hidden" name="incident_state_id" id="incidentStateId" value="2">

                <div class="mb-4">
                    <label for="lifting_period" class="block text-sm font-bold text-gray-700 mb-2">Seleccione la nueva fecha de levantamiento:</label>
                    <input type="date" name="lifting_period" id="lifting_period" value="{{ $incident->lifting_period }}" min="{{ date('Y-m-d') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="flex items-center justify-end mt-6">
                    <button type="button" id="closeModalBtn" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300 ease-in-out mr-4">
                        Cancelar
                    </button>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300 ease-in-out">
                        Confirmar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // JavaScript para controlar la visibilidad del modal
    document.addEventListener('DOMContentLoaded', function() {
        const openModalBtn = document.getElementById('openModalLifting');
        const modal = document.getElementById('modalLifting');
        const closeModalBtn = document.getElementById('closeModalBtn');

        openModalBtn.addEventListener('click', function() {
            modal.classList.remove('hidden');
        });

        closeModalBtn.addEventListener('click', function() {
            modal.classList.add('hidden');
        });
    });
</script>


