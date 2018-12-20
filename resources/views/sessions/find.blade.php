@extends('layouts.master')

@section('title')
    Find
@endsection

@section('content')
    <h1>Find a Session</h1>

    <form method='GET' action='/sessions/search-process'>

        <fieldset>
            <label for='searchDate'>Search by date:</label>
            <input type='date' name='searchDate' id='searchDate' value='{{ old('searchDate', $searchDate) }}'>
        </fieldset>

        <input type='submit' value='Search' class='btn btn-primary'>

    </form>

    @if($searchDate)
        <h2>Results for query: <em>{{ date_format(date_create($searchDate), 'm/d/Y') }}</em></h2>

        @if(count($searchResults) == 0)
            No matches found.
        @else
            @foreach($searchResults as $id => $session)
                <div class='sessions'>
                    @include('sessions._session')
                    <a href='/sessions/{{ $session->id }}'>View Session</a>
                </div>
            @endforeach
        @endif
    @endif

@endsection