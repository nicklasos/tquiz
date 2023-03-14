<h3>Tournaments</h3>
@foreach ($tournaments as $tournament)
    <p>
        <b>{{ $tournament->title }}</b><br>
        {{ $tournament->description }}
    <form action="{{ route('tournament.join', $tournament) }}" method="post">
        <button type="submit">Join tournament</button>
    </form>
    </p>
@endforeach
