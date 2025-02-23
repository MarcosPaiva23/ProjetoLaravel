@extends('layouts.main_layout')
@section('content')

<div class="texto">
    <table class="table table-success table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Photo</th>
                <th>Release Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($albums as $album)
                <tr>
                    <td>{{ $album->name }}</td>
                    <td>
                        @if($album->photo)
                            <img src="{{ asset('storage/' . $album->photo) }}" class="table-image">
                        @else
                            <img src="{{ asset('images/no-photo.jpg') }}" class="table-image">
                        @endif
                    </td>
                    <td>{{ $album->release_date }}</td>
                    <td><a class="btn btn-success" href="{{ route('albums.edit', $album->id) }}">Edit</a>
                        <a class="btn btn-danger" href="{{route('albums.delete', $album->id)}}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
