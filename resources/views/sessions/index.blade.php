@extends('layouts.master')

@section('title')
    All sessions
@endsection

@push('head')
@endpush

@section('content')
    <section class='new_session' id='newSessions'>
        <h2>Recently added Sessions: </h2>
        <ul>
            @foreach($newSessions as $newSession)
                <li>
                    {{ $newSession->day->convertDate() }}
                    @foreach($newSession->descriptions as $description)
                        {{ $description->type. ' // ' }}
                    @endforeach
                </li>
            @endforeach
        </ul>
    </section>

    <section id='allSessions'>
        <h1>All Sessions</h1>
        @foreach($sessions as $session)
            @include('sessions._session')
        @endforeach
    </section>
@endsection