<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Anggota - {{ $anggota['nama'] }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0 rounded">
                    <div class="card-header bg-success text-white py-3">
                        <h5 class="mb-0 fw-bold text-center">Detail Informasi Anggota</h5>
                    </div>
                    <div class="card-body p-4">
                        <table class="table table-borderless fs-6">
                            <tr>
                                <th class="text-secondary" style="width: 35%">Kode Anggota</th>
                                <td>: <strong class="text-dark">{{ $anggota['kode'] }}</strong></td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Nama Lengkap</th>
                                <td>: {{ $anggota['nama'] }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Email</th>
                                <td>: {{ $anggota['email'] }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Telepon</th>
                                <td>: {{ $anggota['telepon'] }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Alamat</th>
                                <td>: {{ $anggota['alamat'] }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Status</th>
                                <td>: 
                                    @if($anggota['status'] == 'Aktif')
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-danger">Non-Aktif</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer bg-white p-3 text-center border-top-0">
                        <a href="{{ url('/anggota') }}" class="btn btn-outline-secondary px-4 fw-semibold shadow-sm">
                            &larr; Kembali ke Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>