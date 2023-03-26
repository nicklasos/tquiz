@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold underline">
        Hello world!
    </h1>

    <div style="max-width: 500px">

        @include('tournaments.list', $tournaments)

    </div>
@endsection
