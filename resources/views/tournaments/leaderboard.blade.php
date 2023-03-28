@forelse($leaderboards as $leaderboard)
    {{ $leaderboard->place }}.
    {{ $leaderboard->tempUser->name }}:
    {{ $leaderboard->score }}
    <br>
@empty
    Waiting for other players
    <br>
@endforelse

<a href="{{ route('home') }}">Play more</a>