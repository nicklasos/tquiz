import {buttonLoader, click} from "./dom_helpers";

export function menuButtonsLoader() {
    click(
        'header-menu',
        '.js-menu-button',
        function (e) {
            buttonLoader(e, {small: true});
        },
    );
}
