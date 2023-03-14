<b>{{ $question->question }}</b>
<br>
@foreach($question->answers as $answer)
    @if ($answer->is_correct)
        <b>
            @endif
            <button class="js-answer-button" data-game-seed-id="{{ $gameSeedId }}" data-answer-id="{{ $answer->id }}">
                {{ $answer->answer }}
            </button>
            @if ($answer->is_correct)
        </b>
    @endif
    <br>
@endforeach