@extends('layouts.app', ['lebar' => 'lebar'])
@section('content')
<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:10px">
    <h3 style="margin:0">Data Program Campaign</h3>
    @auth
        <a href="{{ route('campaigns.create') }}"
           style="background:#ff9800; color:#000; padding:8px 14px; border-radius:4px; font-weight:bold; text-decoration:none">
            + Tambah Campaign
        </a>
    @else
        <a href="{{ route('login') }}" style="font-size:13px">Login untuk menambah campaign</a>
    @endauth
</div>

<table>
    <thead>
        <tr><th>No</th><th>Judul</th><th>Kategori</th><th>Target</th><th>Terkumpul</th><th>Aksi</th></tr>
    </thead>
    <tbody>
        @forelse ($campaigns as $c)
        <tr>
            <td>{{ $campaigns->firstItem() + $loop->index }}</td>
            <td>{{ $c->judul }}</td>
            <td>{{ $c->kategori->nama }}</td>
            <td>Rp {{ number_format($c->target_dana, 0, ',', '.') }}</td>
            <td>Rp {{ number_format($c->terkumpul, 0, ',', '.') }}</td>
            <td>
                <a href="{{ route('campaigns.show', $c) }}">Lihat</a>
                @auth
                    | <a href="{{ route('campaigns.edit', $c) }}">Edit</a>
                    | <form action="{{ route('campaigns.destroy', $c) }}" method="POST" style="display:inline"
                            onsubmit="return confirm('Hapus campaign ini?')">
                        @csrf @method('DELETE')
                        <button style="color:#c00;background:none;border:none;cursor:pointer">Hapus</button>
                    </form>
                @endauth
            </td>
        </tr>
        @empty
        <tr><td colspan="6" style="text-align:center">Belum ada campaign.</td></tr>
        @endforelse
    </tbody>
</table>
<div style="margin-top:10px">{{ $campaigns->links() }}</div>
@endsection