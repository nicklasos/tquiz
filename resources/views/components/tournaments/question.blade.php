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
                <button class="js-answer-button question__button" data-game-id="{{ $game->id }}" data-answer-id="{{ $answer->id }}">
                    {{ $answer->answer }}
                </button>
            @endforeach
        </div>
    </div>
</div>
