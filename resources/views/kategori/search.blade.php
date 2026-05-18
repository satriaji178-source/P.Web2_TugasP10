@extends('layouts.app')

@section('title', 'Hasil Pencarian: ' . $keyword)

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h2 class="fw-bold">Hasil Pencarian Kategori</h2>
        <p class="text-secondary">Menampilkan kategori yang cocok dengan kata kunci: <mark class="bg-warning px-2 py-0 fw-bold text-dark rounded">"{{ $keyword }}"</mark></p>
        <hr>
    </div>
</div>

@if(count($kategori_list) > 0)
<div class="row g-4">
    @foreach($kategori_list as $kategori)
    <div class="col-md-4">
        <div class="card h-100 shadow-sm border-0 rounded border-start border-primary border-4">
            <div class="card-body p-4 d-flex flex-column">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="card-title fw-bold text-dark mb-0">
                        {!! str_ireplace($keyword, "<mark class='bg-warning p-0 fw-bold'>$keyword</mark>", $kategori['nama']) !!}
                    </h5>
                    <span class="badge bg-primary rounded-pill">{{ $kategori['jumlah_buku'] }} Buku</span>
                </div>
                <p class="card-text text-secondary flex-grow-1">
                    {!! str_ireplace($keyword, "<mark class='bg-warning p-0 fw-bold'>$keyword</mark>", $kategori['deskripsi']) !!}
                </p>
                <div class="mt-3">
                    <a href="{{ route('kategori.show', $kategori['id']) }}" class="btn btn-outline-primary btn-sm w-100 shadow-sm">
                        Lihat Selengkapnya &rarr;
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="row justify-content-center">
    <div class="col-md-6 text-center py-5">
        <span class="fs-1 d-block mb-3">🔍</span>
        <h4 class="fw-bold text-dark">Kategori Tidak Ditemukan</h4>
        <p class="text-secondary">Maaf, kata kunci "{{ $keyword }}" tidak cocok dengan kategori manapun.</p>
        <a href="{{ route('kategori.index') }}" class="btn btn-primary shadow-sm px-4 mt-2">Kembali ke Semua Kategori</a>
    </div>
</div>
@endif
@endsection