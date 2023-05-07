<div class="leaderboard">
    <div class="leaderboard__title">
        @if ($game->isDone() && $game->place === 1)
            YOU WON!
        @elseif ($game->isDone())
            RESULT
        @else
            In progress...
        @endif
    </div>
    <div class="leaderboard__subtitle">
        {{ $game->tournament->title }}
    </div>
    <div class="leaderboard__table">
        <div class="leaderboard__table_header">
            <div class="col-1">
                #
            </div>
            <div class="col-2">
                Player
            </div>
            <div class="col-3">
                Score
            </div>
        </div>
        @if ($game->isDone())
            @foreach($leaderboards as $leaderboard)
                <div @class([
                    'leaderboard__row',
                    "position-{$leaderboard->place}",
                    'position-you' => $leaderboard->is_main_user,
                ])>
                    <div class="col-1">
                        @if ($leaderboard->isWinningPlace())
                            <img
                                class="leaderboard__trophy"
                                src="/img/icons/trophy-{{ $leaderboard->place }}.svg"
                                alt="{{ $leaderboard->place }} place icon">
                        @endif
                        {{ $leaderboard->place }}
                    </div>
                    <div class="col-2">
                        <x-avatar :user="$leaderboard->tempUser"/>
                        <span class="leaderboard__name">
                            @if($leaderboard->is_main_user)
                                <span class="leaderboard__you">(You)</span>
                            @endif
                            {{ $leaderboard->tempUser->name }}
                        </span>
                    </div>
                    <div class="col-3">
                        <div class="leaderboard_score">
                            {{ $leaderboard->score }}
                        </div>
                    </div>
                </div>
            @endforeach
        @elseif ($game->isWaitingParticipants())
            <div @class([
                'leaderboard__row',
                'position-1',
                'position-you' => true,
            ])>
                <div class="col-1">
                    <img src="/img/icons/trophy-1.svg" class="leaderboard__trophy" alt="1 place icon"> 1
                </div>
                <div class="col-2">
                    <x-avatar :user="$game->tempUser"/>
                    <span class="leaderboard__name">
                        <span class="leaderboard__you">(You)</span>
                        {{ $game->tempUser->name }}
                    </span>
                </div>
                <div class="col-3">
                    <div class="leaderboard_score">
                        {{ $game->score }}
                    </div>
                </div>
            </div>
            @for ($i = 0; $i < $game->tournament->players; $i++)
                <div class="leaderboard__row">
                    <div class="leaderboard__row_waiting">
                        Waiting for participants
                    </div>
                </div>
            @endfor
        @elseif ($game->isFakeWaiting())
            @foreach($leaderboards as $leaderboard)
                <div @class([
                    'leaderboard__row',
                    "position-{$leaderboard->place}",
                    'position-you' => $leaderboard->is_main_user,
                ])>
                    <div class="col-1">
                        @if ($leaderboard->isWinningPlace())
                            <img src="/img/icons/trophy-{{ $leaderboard->place }}.svg"
                                 alt="{{ $leaderboard->place }} place icon">
                        @endif
                        {{ $leaderboard->place }}
                    </div>
                    <div class="col-2">
                        <x-avatar :user="$leaderboard->tempUser"/>
                        <span class="leaderboard__name">
                            @if($leaderboard->is_main_user)
                                <span class="leaderboard__you">(You)</span>
                            @endif
                            {{ $leaderboard->tempUser->name }}
                        </span>
                    </div>
                    <div class="col-3">
                        <div class="leaderboard_score">
                            @if ($leaderboard->isPlaying())
                                Playing
                            @else
                                {{ $leaderboard->score }}
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
