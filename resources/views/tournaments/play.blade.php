@extends('layouts.app')

@section('content')

    <div id="question-container">

        @include('tournaments.question', [$question, $gameSeedId])

    </div>
@endsection
