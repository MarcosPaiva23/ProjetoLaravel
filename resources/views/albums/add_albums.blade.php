@extends('layouts.main_layout')
@section('content')

<div class="texto">

    <h2>Add Albuns</h2>
        <hr>

        <form action="{{ route('albums.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Album Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text"></div>
                @error('name')
                    Invalid name
                @enderror
            </div>
            <div class="mb-3">
                <label for="bands_id">Band</label>
                <select name="bands_id" required>
                    @foreach ($bands as $band)
                        <option value="{{ $band->id }}">{{ $band->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <label for="exampleFormControlFile1">Add Photo</label>
                    <input type="file" name="photo" class="form-control-file" id="exampleFormControlFile1">
                </div>
                @error('photo')
                    Invalid photo
                @enderror
            </div>
            <button type="submit" class="btn btn-dark">Add Album</button>
        </form>

</div>
@endsection
