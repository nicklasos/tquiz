<x-layout tab="results" js-page="results">
    <div id="results-container">
        <h2>Pending Tournaments</h2>
        <x-tournaments.results-list :games="$waitingGames"/>

        <br>
        <h2>Completed Tournaments</h2>
        <x-tournaments.results-list :games="$completedGames"/>
    </div>
</x-layout>
