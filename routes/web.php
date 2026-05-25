<?php

use Illuminate\Support\Facades\Route;
use App\Models\Buku;
use App\Models\Anggota;

/**
 * Helper function untuk membungkus konten HTML dengan layout standar Bootstrap 5.
 * Ini membuat kode rute di bawah tetap bersih namun memiliki tampilan yang sangat menarik.
 */
function renderDenganBootstrap($title, $content) {
    return '
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>' . $title . '</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body { background-color: #f4f6f9; font-family: "Segoe UI", Roboto, Helvetica, Arial, sans-serif; padding-bottom: 50px; }
            .navbar { shadow-sm: 0 2px 4px rgba(0,0,0,.08); }
            .main-card { border: none; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); background: #fff; padding: 30px; }
            .card-tugas { border: none; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); margin-bottom: 30px; overflow: hidden; }
            .card-tugas .card-header { font-weight: 700; font-size: 1.1rem; padding: 15px 20px; border: none; }
            .badge-num { display: inline-block; width: 26px; height: 26px; background-color: rgba(255,255,255,0.25); text-align: center; line-height: 26px; border-radius: 50%; margin-right: 10px; font-size: 0.85rem; }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold text-info" href="/test-accessor-scope">📚 Perpus Dashboard</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link" href="/buku">Master Buku</a>
                        <a class="nav-link" href="/anggota">Master Anggota</a>
                        <a class="nav-link" href="/test-query">Query Lama</a>
                        <a class="nav-link btn btn-warning btn-sm text-dark fw-bold px-3 ms-2 text-white" href="/test-accessor-scope">✨ TUGAS 2 TEST</a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container">
            ' . $content . '
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>';
}

Route::get('/', function () {
    return view('welcome');
});

// =========================================================================
// ========== TESTING MASTER DATA BUKU ==========
// =========================================================================

// List all buku
Route::get('/buku', function () {
    $bukus = Buku::all();
    
    $html = '<div class="main-card">';
    $html .= '<div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 m-0 text-primary fw-bold">Daftar Koleksi Buku</h1>
                <a href="/buku/create" class="btn btn-success btn-sm">+ Tambah Buku</a>
             </div>';
    $html .= '<div class="table-responsive">';
    $html .= '<table class="table table-striped table-hover table-bordered align-middle">';
    $html .= '<thead class="table-dark">
                <tr>
                    <th width="5%">ID</th>
                    <th>Kode</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Status Stok</th>
                    <th width="15%" class="text-center">Aksi</th>
                </tr>
              </thead><tbody>';
    
    foreach ($bukus as $buku) {
        $html .= '<tr>';
        $html .= '<td>' . $buku->id . '</td>';
        $html .= '<td><span class="badge bg-secondary">' . $buku->kode_buku . '</span></td>';
        $html .= '<td><strong>' . $buku->judul . '</strong></td>';
        $html .= '<td>' . $buku->kategori . '</td>';
        $html .= '<td>' . $buku->harga_format . '</td>';
        $html .= '<td>' . $buku->stok . '</td>';
        $html .= '<td>' . $buku->status_stok_badge . '</td>';
        $html .= '<td class="text-center">
                    <a href="/buku/' . $buku->id . '" class="btn btn-info btn-sm text-white px-2 py-1">Detail</a> 
                    <a href="/buku/' . $buku->id . '/edit" class="btn btn-warning btn-sm px-2 py-1">Edit</a>
                  </td>';
        $html .= '</tr>';
    }
    
    $html .= '</tbody></table></div></div>';
    
    return renderDenganBootstrap('Daftar Buku', $html);
});

// Show single buku
Route::get('/buku/{id}', function ($id) {
    $buku = Buku::findOrFail($id);
    
    $html = '<div class="main-card">';
    $html .= '<div class="mb-4 d-flex justify-content-between align-items-center">
                <h1 class="h3 m-0 text-primary fw-bold">Detail Data Buku</h1>
                <a href="/buku" class="btn btn-secondary btn-sm">&larr; Kembali</a>
             </div>';
    $html .= '<table class="table table-bordered table-striped table-hover">';
    $html .= '<thead class="table-secondary"><tr><th width="35%">Field Data</th><th>Nilai / Value</th></tr></thead><tbody>';
    $html .= '<tr><td>ID Buku</td><td>' . $buku->id . '</td></tr>';
    $html .= '<tr><td>Kode Buku</td><td><span class="badge bg-dark">' . $buku->kode_buku . '</span></td></tr>';
    $html .= '<tr><td>Judul Buku</td><td><strong>' . $buku->judul . '</strong></td></tr>';
    $html .= '<tr><td>Kategori</td><td>' . $buku->kategori . '</td></tr>';
    $html .= '<tr><td>Pengarang</td><td>' . $buku->pengarang . '</td></tr>';
    $html .= '<tr><td>Penerbit</td><td>' . $buku->penerbit . '</td></tr>';
    $html .= '<tr><td>Tahun Terbit</td><td>' . $buku->tahun_terbit . ' <span class="badge bg-info text-dark ms-2">' . $buku->tahun_label . '</span></td></tr>';
    $html .= '<tr><td>ISBN</td><td>' . $buku->isbn . '</td></tr>';
    $html .= '<tr><td>Harga</td><td><span class="text-success fw-bold">' . $buku->harga_format . '</span></td></tr>';
    $html .= '<tr><td>Stok Saat Ini</td><td>' . $buku->stok . ' ' . $buku->status_stok_badge . '</td></tr>';
    $html .= '<tr><td>Apakah Tersedia di Rak?</td><td>' . ($buku->tersedia ? '<span class="badge bg-success">Tersedia</span>' : '<span class="badge bg-danger">Kosong</span>') . '</td></tr>';
    $html .= '<tr><td>Waktu Data Masuk</td><td>' . $buku->created_at . '</td></tr>';
    $html .= '<tr><td>Waktu Data Update</td><td>' . $buku->updated_at . '</td></tr>';
    $html .= '</tbody></table></div>';
    
    return renderDenganBootstrap('Detail Buku', $html);
});

// =========================================================================
// ========== TESTING MASTER DATA ANGGOTA ==========
// =========================================================================

// List all anggota
Route::get('/anggota', function () {
    $anggotas = Anggota::all();
    
    $html = '<div class="main-card">';
    $html .= '<h1 class="h3 text-primary fw-bold mb-4">Daftar Anggota Perpustakaan</h1>';
    $html .= '<div class="table-responsive">';
    $html .= '<table class="table table-striped table-hover table-bordered align-middle">';
    $html .= '<thead class="table-dark">
                <tr>
                    <th width="5%">ID</th>
                    <th>Kode Anggota</th>
                    <th>Nama Lengkap</th>
                    <th>Alamat Email</th>
                    <th>Umur</th>
                    <th>Kategori Usia</th>
                    <th>Status Akun</th>
                    <th width="10%" class="text-center">Aksi</th>
                </tr>
              </thead><tbody>';
    
    foreach ($anggotas as $anggota) {
        $html .= '<tr>';
        $html .= '<td>' . $anggota->id . '</td>';
        $html .= '<td><span class="badge bg-secondary">' . $anggota->kode_anggota . '</span></td>';
        $html .= '<td><strong>' . $anggota->nama . '</strong></td>';
        $html .= '<td>' . $anggota->email . '</td>';
        $html .= '<td>' . $anggota->umur . ' tahun</td>';
        $html .= '<td><span class="badge bg-info text-dark">' . $anggota->kategori_usia . '</span></td>';
        $html .= '<td>' . $anggota->status_badge . '</td>';
        $html .= '<td class="text-center"><a href="/anggota/' . $anggota->id . '" class="btn btn-info btn-sm text-white px-3">Detail</a></td>';
        $html .= '</tr>';
    }
    
    $html .= '</tbody></table></div></div>';
    
    return renderDenganBootstrap('Daftar Anggota', $html);
});

// Show single anggota
Route::get('/anggota/{id}', function ($id) {
    $anggota = Anggota::findOrFail($id);
    
    $html = '<div class="main-card">';
    $html .= '<div class="mb-4 d-flex justify-content-between align-items-center">
                <h1 class="h3 m-0 text-primary fw-bold">Profil Detail Anggota</h1>
                <a href="/anggota" class="btn btn-secondary btn-sm">&larr; Kembali</a>
             </div>';
    $html .= '<table class="table table-bordered table-striped table-hover">';
    $html .= '<thead class="table-secondary"><tr><th width="35%">Atribut Anggota</th><th>Nilai / Keterangan</th></tr></thead><tbody>';
    $html .= '<tr><td>Kode Anggota</td><td><span class="badge bg-dark">' . $anggota->kode_anggota . '</span></td></tr>';
    $html .= '<tr><td>Nama Lengkap</td><td><strong>' . $anggota->nama . '</strong></td></tr>';
    $html .= '<tr><td>Alamat Email</td><td>' . $anggota->email . '</td></tr>';
    $html .= '<tr><td>Nomor Telepon</td><td>' . $anggota->telepon . '</td></tr>';
    $html .= '<tr><td>Alamat Rumah</td><td>' . $anggota->alamat . '</td></tr>';
    $html .= '<tr><td>Tanggal Lahir</td><td>' . $anggota->tanggal_lahir->format('d-m-Y') . '</td></tr>';
    $html .= '<tr><td>Umur Sekarang</td><td>' . $anggota->umur . ' tahun (<span class="badge bg-info text-dark">' . $anggota->kategori_usia . '</span>)</td></tr>';
    $html .= '<tr><td>Jenis Kelamin</td><td>' . ($anggota->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan') . '</td></tr>';
    $html .= '<tr><td>Profesi / Pekerjaan</td><td>' . $anggota->pekerjaan . '</td></tr>';
    $html .= '<tr><td>Tanggal Terdaftar</td><td>' . $anggota->tanggal_daftar->format('d-m-Y') . '</td></tr>';
    $html .= '<tr><td>Masa Keanggotaan</td><td><span class="text-primary fw-bold">' . $anggota->lama_anggota . ' hari</span></td></tr>';
    $html .= '<tr><td>Status Validasi</td><td>' . $anggota->status_badge . '</td></tr>';
    $html .= '</tbody></table></div>';
    
    return renderDenganBootstrap('Detail Anggota', $html);
});

// =========================================================================
// ========== TESTING QUERY LAMA ==========
// =========================================================================
Route::get('/test-query', function () {
    $html = '<div class="main-card">';
    $html .= '<h1 class="h3 text-dark fw-bold mb-4">Hasil Evaluasi: Query Eloquent (Lama)</h1>';
    
    // Buku tersedia
    $tersedia = Buku::tersedia()->get();
    $html .= '<h3 class="h5 text-primary mt-3">📋 Buku Tersedia (Stok > 0): <span class="badge bg-primary rounded-pill">' . $tersedia->count() . '</span></h3>';
    $html .= '<ul class="list-group mb-4">';
    foreach ($tersedia as $buku) {
        $html .= '<li class="list-group-item d-flex justify-content-between align-items-center">' . $buku->judul . ' <span class="badge bg-light text-dark border">Sisa: ' . $buku->stok . '</span></li>';
    }
    $html .= '</ul>';
    
    // Buku Programming
    $programming = Buku::kategori('Programming')->get();
    $html .= '<h3 class="h5 text-primary mt-3">💻 Buku Kategori Programming: <span class="badge bg-primary rounded-pill">' . $programming->count() . '</span></h3>';
    $html .= '<ul class="list-group mb-4">';
    foreach ($programming as $buku) {
        $html .= '<li class="list-group-item">' . $buku->judul . '</li>';
    }
    if($programming->isEmpty()) $html .= '<li class="list-group-item text-muted">Tidak ada buku kategori Programming.</li>';
    $html .= '</ul>';
    
    // Anggota Aktif
    $aktif = Anggota::aktif()->get();
    $html .= '<h3 class="h5 text-primary mt-3">👥 Anggota Perpustakaan Aktif: <span class="badge bg-primary rounded-pill">' . $aktif->count() . '</span></h3>';
    $html .= '<ul class="list-group mb-4">';
    foreach ($aktif as $anggota) {
        $html .= '<li class="list-group-item d-flex justify-content-between align-items-center">' . $anggota->nama . ' <span class="text-muted small">' . $anggota->email . '</span></li>';
    }
    $html .= '</ul>';
    $html .= '</div>';
    
    return renderDenganBootstrap('Testing Query Lama', $html);
});


// =========================================================================
// ========== C. TESTING ROUTE BARU (TUGAS 2 BERURUTAN 1-6) ==========
// =========================================================================
Route::get('/test-accessor-scope', function () {
    $html = '<h1 class="mt-2">Testing Accessor & Scope</h1>';
    
    $html .= '<div class="row justify-content-center"><div class="col-xl-10">';

    // -------------------------------------------------------------------------
    // 1. Buku dengan status_stok_badge
    // -------------------------------------------------------------------------
    $html .= '<div class="card card-tugas">';
    $html .= '<div class="card-header bg-primary text-white"><span class="badge-num">1</span> Buku dengan status_stok_badge</div>';
    $html .= '<ul class="list-group list-group-flush">';
    foreach (Buku::all() as $buku) {
        $html .= '<li class="list-group-item d-flex justify-content-between align-items-center">'
                    . '<div><span class="fw-bold text-dark">' . $buku->judul . '</span> <span class="text-muted ms-2">(Stok: ' . $buku->stok . ')</span></div>'
                    . '<div>' . $buku->status_stok_badge . '</div>'
               . '</li>';
    }
    $html .= '</ul>';
    $html .= '</div>';

    // -------------------------------------------------------------------------
    // 2. Buku terbaru (scope)
    // -------------------------------------------------------------------------
    $html .= '<div class="card card-tugas">';
    $html .= '<div class="card-header bg-success text-white"><span class="badge-num">2</span> Buku Terbaru (Scope: terbaru)</div>';
    $html .= '<ul class="list-group list-group-flush">';
    $bukuTerbaru = Buku::terbaru()->get();
    foreach ($bukuTerbaru as $buku) {
        $html .= '<li class="list-group-item d-flex justify-content-between align-items-center list-group-item-success">'
                    . '<div>✨ <span class="fw-bold">' . $buku->judul . '</span></div>'
                    . '<span class="badge bg-dark">Tahun Terbit: ' . $buku->tahun_terbit . '</span>'
               . '</li>';
    }
    if ($bukuTerbaru->isEmpty()) {
        $html .= '<li class="list-group-item text-muted text-center py-4">Tidak ada data buku terbaru (Tahun >= 2024).</li>';
    }
    $html .= '</ul>';
    $html .= '</div>';

    // -------------------------------------------------------------------------
    // 3. Buku stok menipis (scope)
    // -------------------------------------------------------------------------
    $html .= '<div class="card card-tugas">';
    $html .= '<div class="card-header bg-danger text-white"><span class="badge-num">3</span> Buku Stok Menipis (Scope: stokMenipis)</div>';
    $html .= '<ul class="list-group list-group-flush">';
    $bukuMenipis = Buku::stokMenipis()->get();
    foreach ($bukuMenipis as $buku) {
        $html .= '<li class="list-group-item d-flex justify-content-between align-items-center list-group-item-danger">'
                    . '<div>⚠️ <span class="fw-bold">' . $buku->judul . '</span></div>'
                    . '<span class="badge bg-danger px-3">Sisa Stok: ' . $buku->stok . '</span>'
               . '</li>';
    }
    if ($bukuMenipis->isEmpty()) {
        $html .= '<li class="list-group-item text-muted text-center py-4">Aman, tidak ada buku dengan stok menipis (0 s.d 5).</li>';
    }
    $html .= '</ul>';
    $html .= '</div>';

    // -------------------------------------------------------------------------
    // 4. Anggota dengan status_badge
    // -------------------------------------------------------------------------
    $html .= '<div class="card card-tugas">';
    $html .= '<div class="card-header bg-info text-dark"><span class="badge-num">4</span> Anggota dengan status_badge</div>';
    $html .= '<ul class="list-group list-group-flush">';
    foreach (Anggota::all() as $anggota) {
        $html .= '<li class="list-group-item d-flex justify-content-between align-items-center">'
                    . '<div><span class="fw-bold text-dark">' . $anggota->nama . '</span> <span class="text-muted ms-2">(' . $anggota->email . ')</span></div>'
                    . '<div>' . $anggota->status_badge . '</div>'
               . '</li>';
    }
    $html .= '</ul>';
    $html .= '</div>';

    // -------------------------------------------------------------------------
    // 5. Anggota dengan kategori_usia
    // -------------------------------------------------------------------------
    $html .= '<div class="card card-tugas">';
    $html .= '<div class="card-header bg-warning text-dark"><span class="badge-num">5</span> Anggota dengan kategori_usia</div>';
    $html .= '<ul class="list-group list-group-flush">';
    foreach (Anggota::all() as $anggota) {
        $html .= '<li class="list-group-item d-flex justify-content-between align-items-center">'
                    . '<div><span class="fw-bold text-dark">' . $anggota->nama . '</span> <span class="text-muted ms-2">(Umur: ' . $anggota->umur . ' tahun)</span></div>'
                    . '<span class="badge bg-dark text-white px-3 py-2">' . $anggota->kategori_usia . '</span>'
               . '</li>';
    }
    $html .= '</ul>';
    $html .= '</div>';

    // -------------------------------------------------------------------------
    // 6. Anggota terdaftar bulan ini (scope)
    // -------------------------------------------------------------------------
    $html .= '<div class="card card-tugas">';
    $html .= '<div class="card-header bg-dark text-white"><span class="badge-num">6</span> Anggota Terdaftar Bulan Ini (Scope: terdaftarBulanIni)</div>';
    $html .= '<ul class="list-group list-group-flush">';
    $anggotaBulanIni = Anggota::terdaftarBulanIni()->get();
    foreach ($anggotaBulanIni as $anggota) {
        $html .= '<li class="list-group-item d-flex justify-content-between align-items-center list-group-item-light">';
        $html .= '<div>📆 <span class="fw-bold text-dark">' . $anggota->nama . '</span></div>';
        $html .= '<span class="badge bg-secondary font-monospace">' . $anggota->tanggal_daftar->format('d M Y') . '</span>';
        $html .= '</li>';
    }
    if ($anggotaBulanIni->isEmpty()) {
        $html .= '<li class="list-group-item text-muted text-center py-4">Tidak ada anggota baru terdaftar di bulan ini.</li>';
    }
    $html .= '</ul>';
    $html .= '</div>';

    $html .= '</div></div>'; // Tutup grid-col & row
    
    return renderDenganBootstrap('Testing Accessor & Scope - Tugas 2', $html);
});