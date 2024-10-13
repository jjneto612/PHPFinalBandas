@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Adicionar Nova Banda</h1>

    {{-- Band creation form --}}
    <form action="{{ route('add.band') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Nome da Banda</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="photo">Foto</label>
            <input type="file" accept="image/*" class="form-control" id="photo" name="photo">
        </div>

        <button type="submit" class="btn btn-primary">Adicionar Banda</button>
    </form>
</div>
@endsection
