<div class="container mx-auto p-8">
        <!-- Botón para abrir el modal -->
        <button id="openModalLifting" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
            Cambiar fecha de subsanacion
        </button>
    </div>

    <!-- Modal -->
    <div id="modalLifting" class="fixed inset-0 flex hidden items-center justify-center bg-gray-800 bg-opacity-75">
        <div class="bg-white p-8 rounded shadow-lg w-1/3">
            <form method="POST" action="{{route ('incident.update', $incident)}}" class="bg-white p-6 rounded shadow-md w-1/2 mx-auto">
                @csrf
                @method('PUT')

                <!-- <div class="mb-4">
                <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Titulo:</label>
                <input type="text" name="title" id="title" value="{{ $incident->title }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div> -->
                <div class="mb-4">
                    <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Determine el plazo de levantamiento:</label>
                    <input type="date" name="lifting_period" id="lifting_period" value="{{ $incident -> lifting_period }}" min="{{ date('Y-m-d') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>


                <!-- <div class="mb-4">
                <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Estado:</label>
                <input type="number" name="incident_state_id" id="incident_state_id" value="{{ $incident->incident_state_id }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div> -->

                <div class="flex items-center justify-between space-x-2">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300 ease-in-out">
                        Confirmar
                    </button>
                    <button type="button" id="closeModalBtn" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300 ease-in-out">
                        Cancelar
                    </button>
                </div>

            </form>

        </div>
    </div>
