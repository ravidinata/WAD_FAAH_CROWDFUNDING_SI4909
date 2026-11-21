@extends('layouts.app')
@section('content')
<h3>Edit Campaign</h3>
<form action="{{ route('campaigns.update', $campaign) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    @include('campaigns._form')
    <button class="btn-simpan">Update Campaign</button>
</form>
@endsection