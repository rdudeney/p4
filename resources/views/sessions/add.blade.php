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
    <div class='add_session'>
        <form method='POST' action='/sessions'>
            <div class='details'>* Required fields</div>
            {{ csrf_field() }}

            <label for='date'>* Date</label>
            <input type='date' name='date' id='date' value='{{ old('date') }}'>
            @include('modules.field-error', ['field' => 'date'])

            <label for='hours'>* Hours</label>
            <input type='number' name='hours' id='hours' value='{{ old('hours') }}'>
            @include('modules.field-error', ['field' => 'hours'])

            <label>* Descriptions</label>
            <ul class='checkboxes'>
                @foreach($descriptions as $descriptionId => $descriptionName)
                    <li><label><input
                                    {{ (in_array($descriptionId, old('descriptions', []) )) ? 'checked' : '' }}
                                    type='checkbox'
                                    name='descriptions[]'
                                    id='descriptions'
                                    value='{{ $descriptionId }}'> {{ $descriptionName }}</label></li>
                @endforeach
            </ul>
            @include('modules.field-error', ['field' => 'descriptions'])

            <input type='submit' value='Enter' class='btn btn-primary'>

        </form>
    </div>

@endsection