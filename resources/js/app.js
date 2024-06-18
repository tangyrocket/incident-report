import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

/*ABRIR Y CERRAR MODAL EDITAR ESTADO*/
document.getElementById('openModalLifting').addEventListener('click', function() {
    document.getElementById('modalLifting').classList.remove('hidden');

});

document.getElementById('closeModalBtn').addEventListener('click', function() {
    document.getElementById('modalLifting').classList.add('hidden');

});



