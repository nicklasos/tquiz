function update(params) {
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
                params.onError(null);
            }
        } else {
            document.getElementById(params.id).innerHTML = xhr.response;
        }
    };

    xhr.onerror = function() {
        if (params.onError) {
            params.onError(null);
        }
    };
}


function addMatchingEventListener(element, eventType, selector, listener, ...optionsArgs) {
    element.addEventListener(eventType, ...optionsArgs, (event) => {
        let target = event.target
        if (target && target.closest(selector)) {
            listener.call(this, event)
        }
    })
}

let questionBox = document.getElementById('question-container');

addMatchingEventListener(questionBox, 'click', '.js-answer-button', function(event) {
    let gameId = event.target.attributes['data-game-id'].value;
    let answerId = event.target.attributes['data-answer-id'].value;

    update({
        url: `/tournament/${gameId}/answer/${answerId}`,
        method: 'POST',
        id: 'question-container',
        onError: function (err) {
            console.log(err);
        },
    });
})
