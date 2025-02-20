@extends('layouts.main_layout')
@section('content')

@if (session('message'))
        <div class="alert alert-sucess">
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
                        <td>{{ $band->albums }}</td>
                        <td>{{ $band->photo }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
