@extends('layout')
@section('title')
    Login View

@endsection
@section('link')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

@endsection

@section('content')
    
    <div class="container">
        <h1>Saioa hasi</h1>

        @if ($errors->has('login_error'))
            <p style="color: red;">{{ $errors->first('login_error') }}</p>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <input type="text" name="username" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit" class="btn">Probatu</button>
        </form>
    </div>
@endsection

