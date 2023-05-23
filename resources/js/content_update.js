import {request} from "./request";

export function update(params) {
    request({
        method: params.method,
        url: params.url,
        onError: params.onError || null,
        callback: function (xhr) {
            if (params.hasOwnProperty('instantUpdate') && params.instantUpdate === false) {
                params.callback(function () {
                    document.getElementById(params.id).innerHTML = xhr.response;
                });
            } else {
                document.getElementById(params.id).innerHTML = xhr.response;

                if (params.hasOwnProperty('callback')) {
                    params.callback();
                }
            }
        },
    });
}
