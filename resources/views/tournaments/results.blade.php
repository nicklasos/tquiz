<x-layout tab="results">
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
                            Date: <span class="results__date_time">13:34:43</span>
                        </div>
                        <div class="results__place">
                            <div class="results__place_trophy">
                                <img src="/img/icons/place_1.svg" alt="first place">
                                <span class="results__place_number">
                                    {{ $game->place }}
                                </span>
                            </div>
                            <div class="results__place_text">
                                place
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
