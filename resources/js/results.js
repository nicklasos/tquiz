import {click} from "./dom_helpers";
import {popup} from "./popup";

export function runResults() {

    click('results-container', '.js-result-button', function (event, el) {
        let gameId = el.getAttribute('data-game-id');

        popup({
            url: `/tournament/${gameId}/leaderboard`,
        }, function () {
        });
    });
}
