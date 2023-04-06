@extends('layouts.app')

@section('js-page', 'tournament')

@section('content')

    <div id="question-container">

        @include('tournaments.question', [$question, $game])

    </div>
@endsection
