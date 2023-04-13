<div>
    <h3>Tournaments new</h3>
    @foreach ($tournaments as $tournament)
        <p>
            <b>{{ $tournament->title }}</b><br>
        {{ $tournament->description }}
        <form action="{{ route('tournament.join', $tournament) }}" method="post">
            <button type="submit">Join tournament</button>
        </form>
        </p>
    @endforeach
</div>
