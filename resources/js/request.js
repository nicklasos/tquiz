export function request(params) {
    let xhr = new XMLHttpRequest();

    xhr.open(params.method || 'GET', params.url);

    if (params.dataType && params.dataType === 'form') {
        const formData = new FormData();

        formData.append("foo", "bar");

        xhr.send(formData);
    } else {
        xhr.send();
    }

    xhr.onload = function() {
        if (xhr.status !== 200) {
            if (params.onError) {
                params.onError(xhr);
            }
        } else {
            if (params.callback) {
                params.callback(xhr);
            }
        }
    };

    xhr.onerror = function() {
        if (params.onError) {
            params.onError(null);
        }
    };
}
