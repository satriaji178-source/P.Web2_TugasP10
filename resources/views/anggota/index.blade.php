@extends('layouts.app')

@section('title', 'Daftar Kategori Buku')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-header bg-primary text-white py-3">
                        <h4 class="mb-0 text-center fw-bold">Daftar Anggota Perpustakaan</h4>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col" class="text-center" style="width: 7%">No</th>
                                        <th scope="col">Kode Anggota</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col" class="text-center">Status</th>
                                        <th scope="col" class="text-center" style="width: 15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($anggota_list as $index => $anggota)
                                    <tr>
                                        <td class="text-center fw-bold">{{ $index + 1 }}</td>
                                        <td><span class="badge bg-secondary">{{ $anggota['kode'] }}</span></td>
                                        <td>{{ $anggota['nama'] }}</td>
                                        <td>{{ $anggota['email'] }}</td>
                                        <td class="text-center">
                                            @if($anggota['status'] == 'Aktif')
                                                <span class="badge bg-success">Aktif</span>
                                            @else
                                                <span class="badge bg-danger">Non-Aktif</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ url('/anggota/'.$anggota['id']) }}" class="btn btn-info btn-sm text-white fw-semibold px-3 shadow-sm">
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection