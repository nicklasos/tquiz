export function event(element, eventType, selector, listener, ...optionsArgs) {
    element.addEventListener(eventType, ...optionsArgs, (event) => {
        let target = event.target
        if (target && target.closest(selector)) {
            listener.call(this, event)
        }
    })
}

export function click(container, selector, listener) {
    event(id('question-container'), 'click', '.js-answer-button', listener);
}

export function id(elementId) {
    return document.getElementById(elementId);
}
