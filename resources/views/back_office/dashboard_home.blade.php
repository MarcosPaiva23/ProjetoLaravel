@extends('layouts.main_layout')
@section('content')
<div class="teste">
    @auth
    <h5>Olá {{ Auth::user()->name }}</h5>
    @if (Auth::user()->user_type == 1)
    <div class="alert alert-light" role="alert">
        Conta de administrador
    </div>

    @endif
    @endauth
</div>
@endsection
 