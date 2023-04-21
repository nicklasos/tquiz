<x-layout>
    <x-slot:tab>results</x-slot:tab>

    <div class="results">
        @foreach ($games as $game)
            <div class="results__result">
                <div class="results__image">
                    <img src="/img/tournaments/fortnite.jpg" alt="fortnite">
                </div>
                <div class="results__body">
                    <div class="results__title">
                        {{ $game->tournament->title }}
                    </div>
                    <div class="results__subtitle">
                        Players: 5<br>
                        Your score: {{ $game->score }}<br>
                        Status: {{ $game->status }}
                    </div>
                    <div class="results__params">
                        <div class="results__date">
                            Date: 13:34:43
                        </div>
                        <div class="results__place">
                            <img src="/img/icons/place_1.svg" alt="first place">
                            Place: {{ $game->place }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
