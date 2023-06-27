import {router} from "./routes";
import {menuButtonsLoader} from "./menu_buttons";


document.addEventListener("DOMContentLoaded", function () {
    if (import.meta.env.VITE_APP_ENV === 'production') {
    }

    menuButtonsLoader();

    router(document.body.getAttribute('data-page'));
});

