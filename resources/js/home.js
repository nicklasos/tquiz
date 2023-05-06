import {buttonLoader, click, loader, unclickable} from "./dom_helpers";

export function runHome() {
    click(
        'main-page-container',
        '.join-button',
        buttonLoader,
    );
}
