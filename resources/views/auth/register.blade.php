@extends('layouts.main')
@section('content')
    <h1>Olá, aqui vais poder adicionar users!</h1>
    <form method="POST" action="{{ route('register.user') }}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
            @error('name')
                name inválido
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                required>
            @error('email')
                Email inválido.
            @enderror
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
            @error('password')
                password inválida. deve ter no mínimo 6 caracteres
            @enderror
        </div>
        <div class="mb-3">
            <label for="user_type" class="form-label">User Type</label>
            <select name="user_type" class="form-select" required>
                <option value="1">Admin</option>
                <option value="2">Staff</option>
                <option value="3">User</option>
            </select>
            @error('user_type')
                escolha inválida
            @enderror
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
