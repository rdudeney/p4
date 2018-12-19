@extends('layouts.master')

@push('head')
@endpush

@section('title')
    Confirm deletion:

@endsection

@section('content')
    <h1>Confirm deletion</h1>

    <p>Are you sure you want to delete?:</p>
    @include('sessions._session')

    <form method='POST' action='/sessions/{{ $session->id }}'>
        {{ method_field('delete') }}
        {{ csrf_field() }}
        <input type='submit' value='Yes, delete it!' class='btn btn-danger btn-small'>
    </form>

    <p class='cancel'>
        <a href='/sessions/{{ $session->id }}'>No, I changed my mind.</a>
    </p>

@endsection