@extends('layouts.master')

@section('content')
<div id="formPeople">
    @if (isset($people))
        <form action="{{ route('people.update', ['id' => $people->id]) }}" method="POST">
    @else
        <form action="{{ route('people.new') }}" method="POST">
    @endif
        @csrf
        <div class="opcion">
            <div class="etiqueta"><label for="name">Name</label></div>
            <div class="campo"><input type="text" name="name" value="{{ $people->name ?? '' }}"></div>
        </div>
        <input type="hidden" name="id" value="{{ $people->id ?? '' }}">
        <div class="opcion">
            <div class="etiqueta"><label for="external_url">External URL</label></div>
            <div class="campo"><input type="text" name="external_url" value="{{ $people->external_url ?? '' }}"></div>
        </div>
        <input type="submit" name="save" value="Guardar">
    </form>
</div>
@endsection