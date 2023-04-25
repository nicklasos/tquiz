export function event(element, eventType, selector, listener, ...optionsArgs) {
    element.addEventListener(eventType, ...optionsArgs, (event) => {
        let target = event.target
        if (target && target.closest(selector)) {
            listener.call(this, event)
        }
    })
}

export function click(container, selector, listener) {
    event(id(container), 'click', selector, listener);
}

export function id(elementId) {
    return document.getElementById(elementId);
}

export function q(query) {
    return document.querySelector(query);
}
