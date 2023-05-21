import {request} from "./request";

export function update(params) {
    request({
        method: params.method,
        url: params.url,
        onError: params.onError || null,
        callback: function (xhr) {
            document.getElementById(params.id).innerHTML = xhr.response;
            if (params.hasOwnProperty('callback')) {
                params.callback();
            }
        },
    });
}
