<x-layout>
    <x-slot:jsPage>tournament</x-slot:jsPage>

    <div id="question-container">

        @include('tournaments.question', [$question, $game])

    </div>

</x-layout>
