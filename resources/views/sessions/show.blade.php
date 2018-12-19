@extends('layouts.master')

@section('title')
    Session
@endsection

@push('head')
@endpush

@section('content')

    <div class='session'>
        @include('sessions._session_show')

        <ul class='sessionActions'>
            <li><a href='/sessions/{{ $session->id }}/edit'><i class="fas fa-pencil-alt"></i> Edit</a>
            <li><a href='/sessions/{{ $session->id }}/delete'><i class="fas fa-trash-alt"></i> Delete</a>
        </ul>
    </div>
@endsection