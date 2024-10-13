@extends('layouts.main')

@section('content')

@if(session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif
    <h4>Bem VIndo</h4>

    <img width="100px" height="60px" src="{{ asset('images/assesement.jpeg') }}" alt="">
    <ul>
        <li><a href="{{ route('show.bands') }}">Ver Bandas</a></li>
        <li><a href="{{ route('adding.band') }}">Adicionar Banda</a></li>
        <li><a href="{{ route('show.albums') }}">Ver Álbums</a></li>
        <li><a href="{{ route('form.albums') }}">Adicionar Álbum</a></li>
    </ul>
@endsection
