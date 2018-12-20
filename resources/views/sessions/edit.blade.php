@extends('layouts.master')

@section('title')
    Edit Session
@endsection

@push('head')
    @include('modules.browser-patch')
@endpush

@section('content')

    @if(count($errors) > 0)
        <div class='alert'>
            Please correct the errors below.
        </div>
    @endif

    <h1>Edit:</h1>
    @include('sessions._session')

    <form method='POST' action='/sessions/{{ $session->id }}'>
        <div class='details'>* Required fields</div>
        {{ csrf_field() }}

        {{ method_field('put') }}
        {{ csrf_field() }}

        <label for='date'>* Date</label>
        <input type='date' name='date' id='date' value='{{ old('date', $session->day->date) }}'>
        @include('modules.field-error', ['field' => 'date'])

        <label for='hours'>* Hours</label>
        <input type='number'  name='hours' id='hours' min='0' max='10' step='0.25' value='{{ old('hours', $session->hours) }}'>
        @include('modules.field-error', ['field' => 'hours'])

        <label>Descriptions</label>
        <ul class='checkboxes'>
            @foreach($descriptions as $descriptionId => $descriptionName)
                <li><label><input
                                {{ (in_array($descriptionId, $descriptionsForThisSession )) ? 'checked' : '' }}
                                type='checkbox'
                                name='descriptions[]'
                                id='descriptions'
                                value='{{ $descriptionId }}'> {{ $descriptionName }}</label></li>
            @endforeach
        </ul>
        @include('modules.field-error', ['field' => 'descriptions'])

        <input type='submit' value='Enter' class='btn btn-primary'>

    </form>

@endsection