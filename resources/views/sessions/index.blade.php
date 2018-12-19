@extends('layouts.master')

@section('title')
    All sessions
@endsection

@push('head')
@endpush

@section('content')
    <section id='newSessions'>
        <h2>Recently added sessions</h2>
        <ul>
            @foreach($newSessions as $newSession)
                <li>{{ $newSession->day->date }}</li>
            @endforeach
        </ul>
    </section>

    <section id='allSessions'>
        <h2>All sessions</h2>
        @foreach($sessions as $session)
            @include('sessions._session')
        @endforeach
    </section>
@endsection