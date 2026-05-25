<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataKategori = [
            [
                'nama_kategori' => 'Programming',
                'deskripsi' => 'Kategori untuk buku-buku pemrograman dan software development.',
                'icon' => 'code-slash',
                'warna' => 'primary',
            ],
            [
                'nama_kategori' => 'Database',
                'deskripsi' => 'Kategori untuk buku pengolahan data, SQL, dan NoSQL.',
                'icon' => 'database',
                'warna' => 'success',
            ],
            [
                'nama_kategori' => 'Web Design',
                'deskripsi' => 'Kategori untuk buku UI/UX, HTML, CSS, dan desain web.',
                'icon' => 'palette',
                'warna' => 'info',
            ],
            [
                'nama_kategori' => 'Networking',
                'deskripsi' => 'Kategori untuk buku jaringan komputer, keamanan, dan server.',
                'icon' => 'wifi',
                'warna' => 'warning',
            ],
            [
                'nama_kategori' => 'Data Science',
                'deskripsi' => 'Kategori untuk buku analisis data, machine learning, dan statistik.',
                'icon' => 'graph-up',
                'warna' => 'danger',
            ],
        ];

        foreach ($dataKategori as $kategori) {
            Kategori::create($kategori);
        }
    }
}