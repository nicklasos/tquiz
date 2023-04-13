<x-layout>
    @foreach ($games as $game)
        <div>
            {{ $game->tournament->title }}, place: {{ $game->place }}, score: {{ $game->score }},
            status: {{ $game->status }}
        </div>
    @endforeach
</x-layout>
