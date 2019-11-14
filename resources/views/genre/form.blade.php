@extends('layouts.master')

@section('scripts')
    <script type="text/javascript">
        function asignarAction(action){

        }
    </script>
@endsection

@section('content')

{{$mensaje ?? ''}}

<form id="store" action="{{ route('genre.store') }}" method="POST">
    @csrf
    <label for="genre">Genre</label>
    <input type="text" name="genre">
</form>

<form id="delete" action="{{ route('genre.delete') }}" method="POST">
    @csrf
    <select id="genresSelect" name="genres[]" multiple>
    @foreach ($genresList as $genre)
        <option ondblclick="window.location.href='{{ route('genre.edit', $genre->genre) }}'" value="{{ $genre->id }}">{{ $genre->genre }}</option>
    @endforeach
    </select>
    <input type="submit" name="delete" value="Eliminar Seleccionados">
</form>
@endsection