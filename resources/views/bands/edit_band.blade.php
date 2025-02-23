@extends('layouts.main_layout')
@section('content')

<div class="texto">
<h2>Here you can edit this band</h2>
        <hr>
        <form method="POST" action="{{route('bands.update', $band->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Band Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text"></div>
                @error('name')
                Invalid name
              @enderror
              </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Number of Albums</label>
              <input type="number"  name="albums" class="form-control" id="exampleInputPassword1">
              @error('albuns')
                Invalid number of albums
              @enderror
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Add Photo</label>
                <input class="form-control" type="file" name="photo" id="formFile">
                @error('photo')
                    <div class="text-danger">Invalid photo</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-dark">Submit changes</button>
          </form>
    </div>
@endsection
