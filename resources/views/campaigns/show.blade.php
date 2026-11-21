@extends('layouts.app')
@section('content')
@php $persen = $campaign->target_dana > 0 ? min(100, round($campaign->terkumpul / $campaign->target_dana * 100)) : 0; @endphp
<div style="text-align:center">
    <span class="kategori">{{ $campaign->kategori->nama }}</span>
    <h2 style="margin:10px 0 5px 0">{{ $campaign->judul }}</h2>

    <img src="{{ $campaign->gambar_url }}" alt="{{ $campaign->judul }}">

    <p style="font-style:italic;color:#555">"{{ $campaign->deskripsi }}"</p>

    <div class="progress"><div style="width: {{ $persen }}%"></div></div>
    <p style="margin:5px 0"><b>Target:</b> Rp {{ number_format($campaign->target_dana, 0, ',', '.') }}</p>
    <p style="margin:5px 0"><b>Terkumpul:</b> Rp {{ number_format($campaign->terkumpul, 0, ',', '.') }} ({{ $persen }}%)</p>

    <button class="btn-donasi" onclick="alert('Terima kasih atas bantuan Anda!')">Donasi Sekarang</button>
</div>
@endsection