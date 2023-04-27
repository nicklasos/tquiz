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
                    @if ($game->isWaiting())
                        Waiting Participants...
                    @endif
                </div>
                <div class="results__params">
                    <div class="results__date">
                        Date: <span class="results__date_time">13:34:43</span>
                    </div>
                    <div class="results__place">
                        @if ($game->status === \App\Models\GameStatus::Done)
                            <div class="results__place_trophy">
                                @if ($game->place <= 3)
                                <img src="/img/icons/trophy-{{ $game->place }}.svg" alt="{{ $game->place }}place">
                                @endif
                                <span class="results__place_number">
                                    {{ $game->place }}
                                </span>
                            </div>
                            <div class="results__place_text">
                                place
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
