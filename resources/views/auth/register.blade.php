@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Rejestracja</h2>
    <form action="{{ route('register.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Imię</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="surname">Nazwisko</label>
            <input type="text" name="surname" id="surname" class="form-control" value="{{ old('surname') }}" required>
            @error('surname') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="username">Nazwa użytkownika</label>
            <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}" required>
            @error('username') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="password">Hasło</label>
            <input type="password" name="password" id="password" class="form-control" required>
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation">Potwierdź hasło</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Zarejestruj</button>
    </form>
</div>
@endsection
