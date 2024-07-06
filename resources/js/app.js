import './bootstrap';


import.meta.glob([
    '../images/**',
  ]);
  
import Alpine from 'alpinejs';

import Chart from 'chart.js/auto';
window.Chart = Chart;

window.Alpine = Alpine;

Alpine.start();

/*ABRIR Y CERRAR MODAL EDITAR ESTADO*/
document.getElementById('openModalLifting').addEventListener('click', function() {
    document.getElementById('modalLifting').classList.remove('hidden');

});

document.getElementById('closeModalBtn').addEventListener('click', function() {
    document.getElementById('modalLifting').classList.add('hidden');

});





