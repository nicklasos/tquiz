import {id, q} from "./dom_helpers";
import {update} from "./content_update";

let onClose = function () {
};

let modal = id("popup");
let modalBody = id('popup-body');
let span = q(".popup__close");
let popupContent = id('popup-content');

function close() {
    modal.style.display = "none";
    modalBody.style.display = "none";

    onClose();
    onClose = function () {
    };

    popupContent.innerHTML = '';
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

    modal.style.display = 'block';

    update({
        url: params.url,
        method: 'GET',
        id: 'popup-content',
        onError: function (err) {
            console.log(err);
            close();
        },
        callback: function () {
            modalBody.style.display = "block";
        },
    });

    if (onCloseCallback) {
        onClose = onCloseCallback;
    }
}
