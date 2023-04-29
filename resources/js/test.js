import {popup} from "./popup";
import {click} from "./dom_helpers";

export function runTest() {

    click('popup-button', '#open-popup', function () {
        popup({
            url: `/tournament/1/leaderboard`,
        }, function () {
            window.location.href = '/';
        });
    })

}
