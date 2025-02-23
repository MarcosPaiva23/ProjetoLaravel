@extends('layouts.main_layout')
@section('content')

@if (session('message'))
        <div class="texto">
            {{ session('message') }}
        </div>
    @endif

    <br>
    <div class="texto">
        <h1>Aqui vês todas as bandas</h1>
        <br>
        <hr>
        <br>
        <table class="table table-success table-bordered">
            <thead>
                <tr>
                    <th scope="col">Band ID</th>
                    <th scope="col">Band name</th>
                    <th scope="col">Nr of Albums</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bands as $band)
                    <tr>
                        <th scope="row">{{ $band->id }}</th>
                        <td>{{ $band->name }}</td>
                        <td>{{ $band->albums }}
                            <a class="btn btn-success" href="{{ route('albums.view', $band->id) }}">Albums</a>
                        </td>
                        <td>
                            @if($band->photo)
                                <img src="{{ asset('storage/' . $band->photo) }}" class="table-image">
                            @else
                                <img src="{{ asset('images/no-photo.jpg') }}" class="table-image">
                            @endif
                        </td>
                        <td><a class="btn btn-success" href="{{ route('bands.edit', $band->id) }}">Edit</a>
                            <a class="btn btn-danger" href="{{route('bands.delete', $band->id)}}">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
