@extends('layouts.app')
@section('content')
<h3>Form Kelola Campaign</h3>
<form action="{{ route('campaigns.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('campaigns._form')
    <button class="btn-simpan">Simpan Campaign</button>
</form>
@endsection