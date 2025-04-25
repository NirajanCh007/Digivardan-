import Echo from 'laravel-echo';

// Reverb client
import Reverb from 'reverb-js';

window.Reverb = Reverb;

window.Echo = new Echo({
    broadcaster: 'reverb',
    host: 'http://127.0.0.1:8080', // Reverb server
    forceTLS: false,
});
