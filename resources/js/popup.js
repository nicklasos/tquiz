import {id, q} from "./dom_helpers";
import {update} from "./content_update";

let onClose = function () {
};

let modal = id("popup");
let span = q(".popup__close");

function close() {
    modal.style.display = "none";

    onClose();
    onClose = function () {
    };

    id('popup-content').innerHTML = '';
}

if (modal) {
    window.onclick = function (event) {
        if (event.target === modal) {
            close();
        }
    }

    span.onclick = close;
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
