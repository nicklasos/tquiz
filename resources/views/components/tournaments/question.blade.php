<div class="question">
    <div class="question__container">
        <h1>{{ $question->theme->name }}</h1>

        @if ($question->getFirstMedia())
            <div class="question__image">
                {{ $question->getFirstMedia() }}
            </div>
        @endif

        <div class="question__text">
            {{ $question->question }}
        </div>

        <div class="question__answers">
            @foreach($question->answers as $answer)
                <button class="js-answer-button question__button"
                        data-game-id="{{ $game->id }}"
                        data-answer-id="{{ $answer->id }}"
                        data-is-correct="{{ $answer->is_correct }}">
                    {{ $answer->answer }}

                    <div class="correct_sign">
                        <img src="/img/icons/check.svg" alt="check mark">
                    </div>
                    <div class="wrong_sign">
                        <img src="/img/icons/cross.svg" alt="cross mark">
                    </div>
                </button>
            @endforeach
        </div>

        @if ($question->description)
            <div class="js-question-description question__description hidden">
                {{ $question->description }}
            </div>
        @endif

        <div class="question__next">
            <button
                class="js-next-button question__next_button hidden"
                data-is-last-question="{{ $isLastQuestion ? 1 : 0 }}"
            >
                @if ($isLastQuestion)
                    Show Results
                @else
                    Next
                @endif
            </button>
        </div>
    </div>

    <div class="js-scroll-to"></div>
</div>
