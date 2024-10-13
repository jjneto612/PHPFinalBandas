@extends('layouts.main')
@section('content')
    <div class="container">
        <h4>Olá {{ Auth::user()->name }}</h4>

        @if (Auth::user()->user_type == 1)
            <div class="alert alert-success">és admin</div>
        @endif
        @if (Auth::user()->user_type == 2)
            <div class="alert alert-success">és do staff</div>
        @endif
        @if (Auth::user()->user_type == 3)
            <div class="alert alert-success">sê bem-vindo.</div>
        @endif
    </div>
    @endsection