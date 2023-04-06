import {update} from "./content_update";
import {click} from "./dom_helpers";

export function runTournament() {
    click('question-container', '.js-answer-button', function (event) {
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
        }
    );
}
