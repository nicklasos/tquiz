<x-layout>
    <x-slot:js-page>home</x-slot:js-page>
    <x-slot:tab>home</x-slot:tab>

    <div class="main__text">
        <h1>TQuiz</h1>
        <p>Multiplayer tournament trivia games</p>
    </div>

        <x-tournaments.list :$tournaments></x-tournaments.list>

</x-layout>
