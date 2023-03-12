@extends('layouts.app')

@section('content')
    <div style="max-width: 500px">
        <h3>Tournaments</h3>
        @foreach ($tournaments as $tournament)
            <p>
                <b>{{ $tournament->title }}</b><br>
                {{ $tournament->description }}
            </p>
        @endforeach
    </div>
@endsection
