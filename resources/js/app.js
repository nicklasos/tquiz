import {router} from "./routes";
import * as Sentry from "@sentry/browser";


document.addEventListener("DOMContentLoaded", function () {

    if (import.meta.env.VITE_APP_ENV === 'production') {
        Sentry.init({
            dsn: import.meta.env.VITE_SENTRY_DSN_PUBLIC,
        });
    }

    router(document.body.getAttribute('data-page'));
});

