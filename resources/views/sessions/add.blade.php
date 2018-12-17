{{-- /resources/views/books/search.blade.php --}}
@extends('layouts.master')

@section('title')
    Add
@endsection

@push('head')
    @include('modules.browser-patch')
@endpush

@section('content')

    <h1>Add a Session</h1>

    <form method='GET' action='/sessions/new-session'>

        <fieldset>
            <label for='searchDate'>Enter a date:</label>
            <input type='date' name='searchDate' id='searchDate'>
            <label for='type'>Choose a type:</label>
            <input type=''
        </fieldset>

        <input type='submit' value='Enter' class='btn btn-primary'>

    </form>

@endsection