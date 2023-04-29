import {router} from "./routes";

document.addEventListener("DOMContentLoaded", function() {
    router(document.body.getAttribute('data-page'));
});
