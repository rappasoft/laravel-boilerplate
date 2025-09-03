window._ = require('lodash');
window.Swal = require('sweetalert2');

/**
 * Bootstrap 5.3 no longer requires jQuery by default.
 * We'll load it conditionally if needed for legacy components.
 */

// Load jQuery only if you have legacy components that require it
// If you don't need jQuery, you can comment out these lines
try {
    window.$ = window.jQuery = require('jquery');
} catch (e) {
    console.warn('jQuery not available - some legacy components may not work');
}

/**
 * Bootstrap 5.3 uses @popperjs/core instead of popper.js
 * The Popper instance is handled automatically by Bootstrap
 */

try {
    // Import Bootstrap - this will automatically handle Popper.js
    require('bootstrap');
} catch (e) {
    console.error('Bootstrap failed to load:', e);
}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
