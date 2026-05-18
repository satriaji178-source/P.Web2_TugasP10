@extends('layouts.app')

@section('title', 'Daftar Kategori Buku')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h2 class="fw-bold">Daftar Kategori Buku</h2>
        <hr>
    </div>
</div>

<div class="row g-4">
    @foreach($kategori_list as $kategori)
    <div class="col-md-4">
        <div class="card h-100 shadow-sm border-0 rounded">
            <div class="card-body p-4 d-flex flex-column">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="card-title fw-bold text-dark mb-0">{{ $kategori['nama'] }}</h5>
                    <span class="badge bg-primary rounded-pill">{{ $kategori['jumlah_buku'] }} Buku</span>
                </div>
                <p class="card-text text-secondary flex-grow-1">{{ $kategori['deskripsi'] }}</p>
                <div class="mt-3">
                    <a href="{{ route('kategori.show', $kategori['id']) }}" class="btn btn-primary btn-sm w-100 shadow-sm">
                        Lihat Detail Kategori &rarr;
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection