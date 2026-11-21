@extends('layouts.app')
@section('content')
<h3>Login</h3>
<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email') <div class="error">{{ $message }}</div> @enderror
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password">
    </div>
    <button class="btn-simpan">Login</button>
</form>
@endsection