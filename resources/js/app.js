import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


    const message = document.querySelector('.success-message');
    if (message) {
        setTimeout(() => {
            message.style.display = 'none';
        }, 2000);
    };
