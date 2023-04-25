import {update} from "./content_update";
import {click, q} from "./dom_helpers";

export function runTournament() {
    let answered = false;
    let gameId = null;
    let answerId = null;

    click('question-container', '.js-next-button', function (event) {
        update({
            url: `/tournament/${gameId}/answer/${answerId}`,
            method: 'POST',
            id: 'question-container',
            onError: function (err) {
                console.log(err);
            },
        });

        answered = false;
        gameId = null;
        answerId = null;
    });

    click('question-container', '.js-answer-button', function (event) {
        if (answered) {
            return;
        }

        gameId = event.target.attributes['data-game-id'].value;
        answerId = event.target.attributes['data-answer-id'].value;
        let isCorrect = event.target.attributes['data-is-correct'].value;
        let nextButton = q('.js-next-button');

        if (isCorrect === '0') {
            event.target.classList.add('wrong');
        }

        q('[data-is-correct="1"]').classList.add('correct');
        let description = q('.js-question-description');
        if (description) {
            description.classList.remove('hidden');
        }

        nextButton.classList.remove('hidden');

        answered = true;

    });
}
