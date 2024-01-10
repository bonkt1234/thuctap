@extends('home')

@section('content')
    @auth
        <p>Hello, {{ $user->username }}!</p>
        <form method="POST" action="{{ url('/logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @else
        <a href="{{ url('/login') }}">Login</a>
        <a href="{{ url('/register') }}">Register</a>
    @endauth
@endsection