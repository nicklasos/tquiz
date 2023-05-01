import {update} from "./content_update";
import {click, q, qAll} from "./dom_helpers";

export function runTournament() {
    let answered = false;
    let gameId = null;
    let answerId = null;

    click('question-container', '.js-show-results-button', function () {
        console.log('leaderboard');
    });

    click('question-container', '.js-next-button', function () {
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

    click('question-container', '.js-answer-button', function (e) {
        if (answered) {
            return;
        }

        answered = true;

        gameId = e.target.attributes['data-game-id'].value;
        answerId = e.target.attributes['data-answer-id'].value;

        let isCorrect = e.target.attributes['data-is-correct'].value;
        let nextButton = q('.js-next-button');
        let correctElements = qAll('[data-is-correct="1"]');
        let scrollTo = q('.js-scroll-to');
        let description = q('.js-question-description');

        if (isCorrect === '0') {
            e.target.classList.add('wrong');
        }

        correctElements.forEach(function (correctEl) {
            correctEl.classList.add('correct');
        });

        if (description) {
            description.classList.remove('hidden');
        }

        nextButton.classList.remove('hidden');

        scrollTo.scrollIntoView({
            behavior: "smooth",
            block: "nearest",
        });
    });
}
