@extends('layouts.main')
@section('content')
    <h1>Olá, aqui vais poder adicionar álbums!</h1>
    <form method="POST" action="{{ route('add.album') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Álbum</label>
            <input type="text" name="name" class="form-control" required>
            @error('album')
                Àlbum Inválido
            @enderror
        </div>
        <div class="form-group">
            <label for="cover">Capa</label>
            <input type="file" accept="image/*" class="form-control" id="cover" name="cover" alt="cc">
        </div>
        <div class="mb-3">
            <label for="date_of_release" class="form-label">Data de Lançamento</label>
            <input type="date" name="date_of_release" class="form-control" required>
            @error('date_of_release')
                <div class="text-danger">Data inválida</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="band_id" class="form-label">Banda</label>
            <select required name="band_id" id="band_id">
                @foreach ($table_bands as $band )
                    <option value="{{$band->id}}">{{$band->name}}</option>
                @endforeach
            </select>
            @error('user_id')
            user_id inválido
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
