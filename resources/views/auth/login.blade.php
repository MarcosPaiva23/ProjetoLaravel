@extends('layouts.main_layout')
@section('content')

@if (session('message'))
        <div class="texto">
            {{ session('message') }}
        </div>
    @endif
<div class="texto">
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" >We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3 form-check">
        <a class="teste" href="{{route('password.request')}}">Esqueceu-se da password?</a>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
</form>
</div>

@endsection
