@extends('layouts.main_layout')
@section('content')
<div class="texto">


    @auth
    <h1>Hello {{ Auth::user()->name }}!!</h1>
    @if (Auth::user()->access_level == 2)
    <div class="alert alert-light" role="alert">
        Admin account
    </div>

    @endif
    @endauth
</div>
@endsection
