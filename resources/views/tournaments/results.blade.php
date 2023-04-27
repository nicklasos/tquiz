<x-layout tab="results">
    <h2>Pending Tournaments</h2>
    <x-tournaments.results-list :games="$waitingGames" />

    <br>
    <h2>Completed Tournaments</h2>
    <x-tournaments.results-list :games="$completedGames" />
</x-layout>
