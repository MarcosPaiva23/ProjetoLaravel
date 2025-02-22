@extends('layouts.main_layout')
@section('content')

<div class="texto">
    <h2>Here you can add new albums</h2>
    <hr>

    <form action="{{ route('albums.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="albumName" class="form-label">Album Name</label>
            <input type="text" name="name" class="form-control" id="albumName">
            @error('name')
                <div class="text-danger">Invalid name</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="release_date" class="form-label">Release Date</label>
            <input type="date" name="release_date" class="form-control" id="release_date" required>
            @error('release_date')
                <div class="text-danger">Invalid date</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="band_id" class="form-label">Band</label>
            <select name="bands_id" class="form-control" id="band_id" required>
                <option value="">Select a band</option>
                @foreach ($bands as $band)
                    <option value="{{ $band->id }}">{{ $band->name }}</option>
                @endforeach
            </select>
            @error('band_id')
                <div class="text-danger">Please select a band</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Album Cover</label>
            <input type="file" name="photo" class="form-control" id="image">
            @error('image')
                <div class="text-danger">Invalid image</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-dark">Add Album</button>
    </form>
</div>
@endsection
