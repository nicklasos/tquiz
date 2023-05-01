@php
    /**
     * @var \App\Models\Question $question
     */
@endphp

<div class="question">
    <div class="question__container">
        <h1>{{ $question->theme->name }}</h1>

        <div class="question__image">
            <img src="/img/tournaments/Image.jpg" alt="Tournament image">
        </div>

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
            @if ($isLastQuestion)
                <button class="js-show-results-button question__next_button hidden"
                        data-game-id="{{ $game->id }}"
                >Show Results</button>
            @else
                <button class="js-next-button question__next_button hidden">Next</button>
            @endif
        </div>
    </div>

    <div class="js-scroll-to"></div>
</div>
