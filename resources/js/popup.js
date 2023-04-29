import {id, q} from "./dom_helpers";
import {update} from "./content_update";

let onClose = function () {
};

let modal = id("popup");
let span = q(".popup__close");
if (modal) {
    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
            onClose();
            onClose = function () {
            };
        }
    }

    span.onclick = function () {
        modal.style.display = "none";
        onClose();
        onClose = function () {
        };
    }
}

export function popup(params, onCloseCallback) {
    if (!modal) {
        return;
    }

    update({
        url: params.url,
        method: 'GET',
        id: 'popup-content',
        onError: function (err) {
            console.log(err);
        },
    });

    onClose = onCloseCallback;

    modal.style.display = "block";
}
