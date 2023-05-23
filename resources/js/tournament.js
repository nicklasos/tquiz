import {update} from "./content_update";
import {buttonLoader, click, getData, q, qAll} from "./dom_helpers";
import {preloadImages} from "./preload_images";

export function runTournament() {

    setTimeout(preloadImages, 1000);

    let answered = false;
    let gameId = null;
    let answerId = null;

    click(
        'question-container',
        '.js-close-leaderboard-button',
        buttonLoader,
    );

    click('question-container', '.js-next-button', function (e) {
        buttonLoader(e);

        document.body.scrollIntoView({
            behavior: "smooth",
            block: "start",
        });

        update({
            url: `/tournament/${gameId}/answer/${answerId}`,
            method: 'POST',
            id: 'question-container',
            callback: function () {
                answered = false;
                gameId = null;
                answerId = null;
            },
            onError: function (err) {
                console.log(err);
            },
        });
    });

    click('question-container', '.js-answer-button', function (e) {
        if (answered) {
            return;
        }

        answered = true;

        gameId = getData(e, 'game-id');
        answerId = getData(e, 'answer-id');

        let isCorrect = getData(e, 'is-correct');
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
