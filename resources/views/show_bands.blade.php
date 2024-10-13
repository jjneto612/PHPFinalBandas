@extends('layouts.main')
@section('content')
   

    @if(session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif

    <h1>Lista das Bandas </h1>

    <form action="{{ route('search.band') }}"method="GET">
        <input type="text" placeholder="Search" name="search"><button type="submit" value="{{ request('search') }}" class="btn btn-info">Procurar</button>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Foto</th>
                <th scope="col">Nº de álbuns</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($table_bands as $band)
                <tr>
                    <th scope="row">{{ $band->id }}</th>
                    <td>{{ $band->name }}</td>
                    <td><img src="{{ $band->photo ? asset('storage/' . $band->photo) : asset('images/nophoto.jpg') }}" alt="{{ $band->name }}" width="100" height="100"></td>
                    <td>{{ $band->albums_count }}</td>
                    <td><a href="{{ route('bands.albums', $band->id) }}">Ver álbuns</a></td>
                    <td><a  href="{{route('delete.band', $band->id)}}" class="btn btn-danger">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if($table_bands->isEmpty())
        <p>Nenhuma banda encontrada</p>
    @endif
@endsection
