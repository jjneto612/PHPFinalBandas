@extends('layouts.main')
@section('content')
@if(session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif
<h1>Álbums de {{ $band->name }}</h1>

@if($albums->isEmpty())
<p>No albums found for this band.</p>
@else
<table>
    <tr>
        <th>Titulo</th>
        <th>Capa</th>
        <th>Data de lançamento</th>
    </tr>
    @foreach($albums as $album)
    <tr>
        <td>{{ $album->name }}</td>
        <td><img src="{{ $album->cover? asset('storage/' . $album->cover) : asset('images/nophoto.jpg') }}" alt=""></td>
        <td>{{ $album->date_of_release}}</td>
        <td><a href="{{ route('edit.albumview', $album->id) }}">Editar álbum</a></td>
        <td><a href="{{route('albums.delete', $album->id)}}" class="btn btn-danger">Apagar álbum</a></td>
    </tr>
    @endforeach
</table>
@endif
@endsection