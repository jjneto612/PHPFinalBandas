@extends('layouts.main')
@section('content')

@if(session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif
<h1>Lista de álbuns</h1>

<form action="{{ route('show.albums') }}" method="GET">
    <div class="form-group">
        <input type="text" name="search" class="form-control" placeholder="Filtrar por nome do presenteado" value="{{ request()->query('search') }}">
    </div>
    <button type="submit" class="btn btn-primary">Buscar</button>
</form>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome do álbum</th>
            <th scope="col">Capa</th>
            <th scope="col">Data de lançamento</th>
            <th scope="col">Banda</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($albums as $album)
            <tr>
                <th scope="row">{{ $album->id }}</th>
                <td>{{ $album->name }}</td>
                <td>{{ $album->cover }}</td>
                <td>{{ $album->date_of_release }}</td>
                <td>{{ $album->bandName }}</td>
            </tr>
        @endforeach

    </tbody>
</table>

@endsection