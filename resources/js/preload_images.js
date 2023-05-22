import {getData, qAll} from './dom_helpers';

export function preloadImages() {
    let images = qAll('.js-preload-images img');

    if (images) {
        images.forEach(function (i) {
            if (i.attributes.hasOwnProperty('data-src')) {
                i.setAttribute('src', i.attributes['data-src'].value);
            }
        });
    }
}
