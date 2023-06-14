<x-layout tab="home" js-page="home">

    <div id="main-page-container">
        <div class="main__text">
            <h1>Untrivial Tournament</h1>
            <p>Embrace the challenge and join tournaments where thrilling video game questions await you</p>
        </div>

        <x-single-player-game />

        <h2 class="game-divider">Multiplayer Trivia</h2>

        <x-tournaments.list :$tournaments/>


        @if ($comingSoon->count())
            <h2 class="main__coming_soon">Coming soon</h2>
            <x-tournaments.list :tournaments="$comingSoon"/>
        @endif
    </div>

</x-layout>
