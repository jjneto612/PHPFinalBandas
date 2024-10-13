@extends('layouts.main')
@section('content')
<h1>Edit Album: {{ $album->name }}</h1>

<!-- Display validation errors if there are any -->
@if($errors->any())
<div style="color: red;">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<!-- Edit form -->
<form action="{{ route('edit.album', $album->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Album title input -->
    <label for="name">Titulo:</label>
    <input type="text" name="name" value="{{ old('title', $album->title) }}" required>
    <br><br>

    <label for="cover">Capa</label>
    <input type="file" name="cover" value="{{ old('cover', $album->cover) }}" required>
    <br><br>
    <!-- Release date input -->
    <label for="date_of_release">Data de Lançamento</label>
    <input type="date" name="date_of_release" value="{{ old('date_of_release', $album->date_of_release) }}" required>
    <br><br>
    <button type="submit">Update Album</button>
</form>

@endsection