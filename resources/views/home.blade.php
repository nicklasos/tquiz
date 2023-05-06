<x-layout tab="home" js-page="home">

    <div id="main-page-container">
        <div class="main__text">
            <h1>Untrivial Tournament</h1>
            <p>Multiplayer tournament trivia games</p>
        </div>

        <x-tournaments.list :$tournaments/>


        <h2 class="main__coming_soon">Coming soon</h2>
        <x-tournaments.list :tournaments="$comingSoon"/>
    </div>

</x-layout>
