<x-layout>
    <x-slot:js-page>tournament</x-slot:js-page>

    <div id="question-container">

        @include('tournaments.question', [$question, $game])

    </div>

</x-layout>
