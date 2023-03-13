<h3>Tournaments</h3>
@foreach ($tournaments as $tournament)
    <p>
        <b>{{ $tournament->title }}</b><br>
        {{ $tournament->description }}
    </p>
@endforeach
