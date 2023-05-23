import {update} from "./content_update";
import {buttonLoader, click, getData, q, qAll} from "./dom_helpers";
import {preloadImages} from "./preload_images";


function scrollTop() {
    document.body.scrollIntoView({
        behavior: "smooth",
        block: "start",
    });
}

function scrollNext() {
    q('.js-scroll-to').scrollIntoView({
        behavior: "smooth",
        block: "nearest",
    });
}

export function runTournament() {

    setTimeout(preloadImages, 1000);

    let gameData = {
        answered: false,
        gameId: null,
        answerId: null,

        clear: function () {
            gameData.answered = false;
            gameData.gameId = null;
            gameData.answerId = null;
        },
    };

    let contentUpdate = {
        _ready: false,
        _update: null,

        done: function () {
            contentUpdate._ready = false;
            contentUpdate._update = null;
            scrollTop();
        },

        ready: function () {
            contentUpdate._ready = true;

            if (contentUpdate._update) {
                contentUpdate._update();
                contentUpdate.done();
            }
        },

        updateWhenReady: function (update) {
            if (contentUpdate._ready) {
                update();
                contentUpdate.done();
            } else {
                contentUpdate._update = update;
            }
        },
    };

    click(
        'question-container',
        '.js-close-leaderboard-button',
        buttonLoader,
    );

    click('question-container', '.js-next-button', function (e) {
        buttonLoader(e);

        contentUpdate.ready();
    });

    click('question-container', '.js-answer-button', function (e) {
        if (gameData.answered) {
            return;
        }

        gameData.answered = true;

        gameData.gameId = getData(e, 'game-id');
        gameData.answerId = getData(e, 'answer-id');

        let isCorrect = getData(e, 'is-correct');
        let nextButton = q('.js-next-button');
        let correctElements = qAll('[data-is-correct="1"]');
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

        scrollNext();

        update({
            url: `/tournament/${gameData.gameId}/answer/${gameData.answerId}`,
            method: 'POST',
            id: 'question-container',
            instantUpdate: false,
            callback: function (update) {
                contentUpdate.updateWhenReady(function () {
                    gameData.clear();

                    update();
                });
            },
            onError: function (err) {
                console.log(err);
            },
        });
    });
}
