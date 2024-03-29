export function event(element, eventType, selector, listener, ...optionsArgs) {
    if (!element) {
        return;
    }

    element.addEventListener(eventType, ...optionsArgs, (event) => {
        let target = event.target
        if (target && target.closest(selector)) {
            listener.call(this, event, target.closest(selector))
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

export function qAll(query) {
    return document.querySelectorAll(query);
}

export function loader(e, params) {
    let classList = 'loader';

    if (params && params.hasOwnProperty('small')) {
        classList += ' loader__small';
    }

    e.target.innerHTML = `<div class="${classList}"></div>`;
}

export function unclickable(e) {
    e.target.classList.add('unclickable');
}

export function buttonLoader(e, params) {
    loader(e, params);
    unclickable(e);
}

export function getData(e, value) {
    return e.target.attributes['data-' + value].value;
}
