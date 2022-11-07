import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


let alert;
if (document.querySelectorAll('.alert') != null) {
    alert = document.querySelectorAll('.alert');
    setTimeout(() => {
        alert.forEach((alert) => {
            alert.classList.add('hidden');
        });
    }, 2000);
};
