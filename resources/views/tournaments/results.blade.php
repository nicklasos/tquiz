<x-layout tab="results" js-page="results">
    <div id="results-container">
        @if ($waitingGames->count())
            <h2>Pending Tournaments</h2>
            <x-tournaments.results-list :games="$waitingGames"/>
            <br>
        @endif

        @if ($completedGames->count())
            <h2>Completed Tournaments</h2>
            <x-tournaments.results-list :games="$completedGames"/>
        @endif

        @if(!$waitingGames->count() && !$completedGames->count())
            <div class="results__no_tournaments">
                <h3>Your stats will appear here once you enter a tournament</h3>
                <a href="{{ route('home') }}" class="join-button">Start Tournament</a>
            </div>
        @endif
    </div>
</x-layout>
