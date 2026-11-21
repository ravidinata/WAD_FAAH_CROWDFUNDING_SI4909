@extends('layouts.app')
@section('content')
<h3>Register</h3>
<form action="{{ route('register') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name') <div class="error">{{ $message }}</div> @enderror
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email') <div class="error">{{ $message }}</div> @enderror
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password">
        @error('password') <div class="error">{{ $message }}</div> @enderror
    </div>
    <div class="form-group">
        <label>Konfirmasi Password</label>
        <input type="password" name="password_confirmation">
    </div>
    <button class="btn-simpan">Daftar</button>
</form>
@endsection