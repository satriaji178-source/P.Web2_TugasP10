<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerpustakaanController;
use App\Http\Controllers\KategoriController;
 
// Route default
Route::get('/', function () {
    return view('welcome');
});

// Route ke controller
// Route::get('/perpustakaan', [PerpustakaanController::class, 'index']);
Route::get('/buku/{id}', [PerpustakaanController::class, 'show']);
Route::get('/about', [PerpustakaanController::class, 'about']);
 
// Route baru - return text
Route::get('/hello', function () {
    return 'Hello dari Laravel!';
});
 
// Route dengan HTML
Route::get('/info', function () {
    return '<h1>Sistem Perpustakaan</h1><p>Selamat datang!</p>';
});
 
// Route dengan JSON
// Route::get('/buku', function () {
//     return [
//         'judul' => 'Laravel Programming',
//         'pengarang' => 'John Doe',
//         'harga' => 150000
//     ];
// });

// Route dengan parameter required
Route::get('/buku/{id}', function ($id) {
    return "Detail buku dengan ID: " . $id;
});
 
// // Route dengan parameter optional
// Route::get('/kategori/{nama?}', function ($nama = 'Semua Kategori') {
//     return "Menampilkan kategori: " . $nama;
// });
 
// Route dengan multiple parameters
Route::get('/search/{kategori}/{keyword}', function ($kategori, $keyword) {
    return "Cari buku kategori: $kategori dengan keyword: $keyword";
});

// Named route
// Route::get('/perpustakaan', function () {
//     return 'Halaman Perpustakaan';
// })->name('perpus.home');
 
// Gunakan named route
Route::get('/test-route', function () {
    $url = route('perpus.home');
    return "URL perpustakaan: " . $url;
});

// Route::get('/perpustakaan', function () {
//     // Data untuk dikirim ke view
//     $nama_sistem = "Sistem Perpustakaan Laravel";
//     $versi = "13.x";
//     $total_buku = 5;
    
//     $buku_list = [
//         [
//             'judul' => 'Pemrograman PHP',
//             'pengarang' => 'Budi Raharjo',
//             'harga' => 75000,
//             'stok' => 10
//         ],
//         [
//             'judul' => 'Laravel Framework',
//             'pengarang' => 'Andi Nugroho',
//             'harga' => 125000,
//             'stok' => 5
//         ],
//         [
//             'judul' => 'MySQL Database',
//             'pengarang' => 'Siti Aminah',
//             'harga' => 95000,
//             'stok' => 0
//         ],
//         [
//             'judul' => 'Web Design',
//             'pengarang' => 'Dedi Santoso',
//             'harga' => 85000,
//             'stok' => 8
//         ],
//         [
//             'judul' => 'JavaScript Modern',
//             'pengarang' => 'Rina Wijaya',
//             'harga' => 80000,
//             'stok' => 12
//         ]
//     ];
    
//     // Return view dengan data
//     return view('perpustakaan.index', [
//         'nama_sistem' => $nama_sistem,
//         'versi' => $versi,
//         'total_buku' => $total_buku,
//         'buku_list' => $buku_list
//     ]);
// });

Route::get('/perpustakaan', function () {
    $nama_sistem = "Sistem Perpustakaan Laravel";
    $versi = "13.x";
    $total_buku = 5;
    
    $buku_list = [
            [
                'id' => 1,
                'judul' => 'Pemrograman PHP',
                'pengarang' => 'Budi Raharjo',
                'harga' => 75000,
                'stok' => 10
            ],
            [
                'id' => 2,
                'judul' => 'Laravel Framework',
                'pengarang' => 'Andi Nugroho',
                'harga' => 125000,
                'stok' => 5
            ],
            [
                'id' => 3,
                'judul' => 'MySQL Database',
                'pengarang' => 'Siti Aminah',
                'harga' => 95000,
                'stok' => 0
            ],
            [
                'id' => 4,
                'judul' => 'Web Design',
                'pengarang' => 'Dedi Santoso',
                'harga' => 85000,
                'stok' => 8
            ],
            [
                'id' => 5,
                'judul' => 'JavaScript Modern',
                'pengarang' => 'Rina Wijaya',
                'harga' => 80000,
                'stok' => 12
            ]
    ];
    
    // Menggunakan compact() - lebih praktis
    return view('perpustakaan.index', compact('nama_sistem', 'versi', 'total_buku', 'buku_list'));
});

Route::get('/anggota', function () {
    $anggota_list = [
        [
            'id' => 1,
            'kode' => 'AGT-001',
            'nama' => 'Budi Santoso',
            'email' => 'budi@email.com',
            'telepon' => '081234567890',
            'alamat' => 'Jakarta',
            'status' => 'Aktif'
        ],
        [
            'id' => 2,
            'kode' => 'AGT-002',
            'nama' => 'Siti Aminah',
            'email' => 'siti@email.com',
            'telepon' => '082198765432',
            'alamat' => 'Bandung',
            'status' => 'Aktif'
        ],
        [
            'id' => 3,
            'kode' => 'AGT-003',
            'nama' => 'Rian Hidayat',
            'email' => 'rian@email.com',
            'telepon' => '085712345678',
            'alamat' => 'Surabaya',
            'status' => 'Non-Aktif'
        ],
        [
            'id' => 4,
            'kode' => 'AGT-004',
            'nama' => 'Dewi Lestari',
            'email' => 'dewi@email.com',
            'telepon' => '081900112233',
            'alamat' => 'Yogyakarta',
            'status' => 'Aktif'
        ],
        [
            'id' => 5,
            'kode' => 'AGT-005',
            'nama' => 'Ahmad Fauzi',
            'email' => 'ahmad@email.com',
            'telepon' => '081344556677',
            'alamat' => 'Semarang',
            'status' => 'Aktif'
        ],
    ];
    
    return view('anggota.index', compact('anggota_list'));  
});

Route::get('/anggota/{id}', function ($id) {
    $anggota_list = [
        [
            'id' => 1,
            'kode' => 'AGT-001',
            'nama' => 'Budi Santoso',
            'email' => 'budi@email.com',
            'telepon' => '081234567890',
            'alamat' => 'Jakarta',
            'status' => 'Aktif'
        ],
        [
            'id' => 2,
            'kode' => 'AGT-002',
            'nama' => 'Siti Aminah',
            'email' => 'siti@email.com',
            'telepon' => '082198765432',
            'alamat' => 'Bandung',
            'status' => 'Aktif'
        ],
        [
            'id' => 3,
            'kode' => 'AGT-003',
            'nama' => 'Rian Hidayat',
            'email' => 'rian@email.com',
            'telepon' => '085712345678',
            'alamat' => 'Surabaya',
            'status' => 'Non-Aktif'
        ],
        [
            'id' => 4,
            'kode' => 'AGT-004',
            'nama' => 'Dewi Lestari',
            'email' => 'dewi@email.com',
            'telepon' => '081900112233',
            'alamat' => 'Yogyakarta',
            'status' => 'Aktif'
        ],
        [
            'id' => 5,
            'kode' => 'AGT-005',
            'nama' => 'Ahmad Fauzi',
            'email' => 'ahmad@email.com',
            'telepon' => '081344556677',
            'alamat' => 'Semarang',
            'status' => 'Aktif'
        ],
    ];
    
    $anggota = collect($anggota_list)->firstWhere('id', $id);
    
    if (!$anggota) {
        abort(404);
    }
    
    return view('anggota.show', compact('anggota'));
});

Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/{id}', [KategoriController::class, 'show'])->name('kategori.show')->where('id', '[0-9]+');
Route::get('/kategori/search/{keyword}', [KategoriController::class, 'search'])->name('kategori.search');