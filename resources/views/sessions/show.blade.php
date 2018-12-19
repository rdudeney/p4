@extends('layouts.master')

@section('title')
    {{ $session->day->date }}
@endsection

@push('head')
@endpush

@section('content')

    <div class='session cf'>
        @include('sessions._session')

        <ul class='sessionActions'>
            <li><a href='/sessions/{{ $session->id }}/edit'><i class="fas fa-pencil-alt"></i> Edit</a>
        </ul>
    </div>
@endsection