@extends('layouts.main')
@section('content')
    <!-- já estou a carregar o obj $user -->

    <form method="POST" action="{{ route('add.band') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $band->id }}" id="">

        <div class="mb-3">
            <label for="nameInput" class="form-label">Nome</label>
            <input type="text" value="{{ $band->name }}" name="name" class="form-control" required>
            @error('name')
                Nome inválido
            @enderror
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Foto</label>
            <input class="form-control" name="photo"  type="file" id="formFile" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection