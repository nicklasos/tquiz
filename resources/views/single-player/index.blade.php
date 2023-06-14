<x-layout js-page="singleplayer">
    <div id="question-container">

        @foreach($singlePlayer->questions as $question)
            <x-tournaments.question
                :$question
                :game="new \App\Models\Tournaments\Game"
                :isLastQuestion="false"/>
        @endforeach

    </div>

    {{--    <x-preload-images :$images />--}}
</x-layout>
