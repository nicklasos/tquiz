<x-layout :tab="'home'" :js-page="'home'">

    <div class="main__text">
        <h1>TQuiz</h1>
        <p>Multiplayer tournament trivia games</p>
    </div>

    <x-tournaments.list :$tournaments></x-tournaments.list>


    <h2 class="main__coming_soon">Coming soon</h2>
    <x-tournaments.list :tournaments="$comingSoon"></x-tournaments.list>

</x-layout>
