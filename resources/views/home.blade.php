@extends('layouts.app')

@section('js-page', 'home')

@section('content')
    <h1 class="text-3xl font-bold underline">
        Hello world!
    </h1>

    <x-button class="mt-5"></x-button>

    <br><br><br>

    <div style="max-width: 500px">

        @include('tournaments.list', $tournaments)

    </div>
@endsection
