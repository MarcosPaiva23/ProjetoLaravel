@extends('layouts.main_layout')
@section('content')

<div class="texto">
    <h2>Login</h2>
    <hr>
    <form method="POST" action="{{ route('users.login') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" name="email" class="form-control">
            @error('email')
                <div class="text-danger">Invalid email</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
            @error('password')
                <div class="text-danger">Invalid password</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-dark">Login</button>
    </form>
</div>

@endsection
