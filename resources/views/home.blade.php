@extends('layouts.app')

@section('content')
    <div style="max-width: 500px">

        @include('tournaments.list', $tournaments)

    </div>
@endsection
