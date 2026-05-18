<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
class KategoriController extends Controller
{
    public function index()
    {
        $kategori_list = [
            [
                'id' => 1,
                'nama' => 'Programming',
                'deskripsi' => 'Buku pemrograman, software engineering, dan coding.',
                'jumlah_buku' => 3
            ],
            [
                'id' => 2,
                'nama' => 'Database',
                'deskripsi' => 'Buku perancangan, pengelolaan, dan optimasi basis data.',
                'jumlah_buku' => 2
            ],
            [
                'id' => 3,
                'nama' => 'Web Design',
                'deskripsi' => 'Buku desain antarmuka, UX/UI, HTML, CSS, dan framework frontend.',
                'jumlah_buku' => 2
            ],
            [
                'id' => 4,
                'nama' => 'Jaringan Komputer',
                'deskripsi' => 'Buku seputar infrastruktur jaringan, keamanan, dan server.',
                'jumlah_buku' => 0
            ],
            [
                'id' => 5,
                'nama' => 'Kecerdasan Buatan',
                'deskripsi' => 'Buku machine learning, data science, dan algoritma cerdas.',
                'jumlah_buku' => 1
            ],
        ];
        
        return view('kategori.index', compact('kategori_list'));
    }
    
    public function show($id)
    {
        $kategori_master = [
            1 => ['id' => 1, 'nama' => 'Programming', 'deskripsi' => 'Buku pemrograman, software engineering, dan coding.'],
            2 => ['id' => 2, 'nama' => 'Database', 'deskripsi' => 'Buku perancangan, pengelolaan, dan optimasi basis data.'],
            3 => ['id' => 3, 'nama' => 'Web Design', 'deskripsi' => 'Buku desain antarmuka, UX/UI, HTML, CSS, dan framework frontend.'],
            4 => ['id' => 4, 'nama' => 'Jaringan Komputer', 'deskripsi' => 'Buku seputar infrastruktur jaringan, keamanan, dan server.'],
            5 => ['id' => 5, 'nama' => 'Kecerdasan Buatan', 'deskripsi' => 'Buku machine learning, data science, dan algoritma cerdas.']
        ];

        if (!array_key_exists($id, $kategori_master)) {
            abort(404, 'Kategori tidak ditemukan.');
        }
        $kategori = $kategori_master[$id];

        $buku_master = [
            ['id' => 101, 'kategori_id' => 1, 'judul' => 'Pemrograman PHP Modern', 'pengarang' => 'Budi Raharjo', 'stok' => 10],
            ['id' => 102, 'kategori_id' => 1, 'judul' => 'Laravel Framework Masterclass', 'pengarang' => 'Andi Nugroho', 'stok' => 5],
            ['id' => 103, 'kategori_id' => 1, 'judul' => 'JavaScript Modern', 'pengarang' => 'Rina Wijaya', 'stok' => 12],
            ['id' => 104, 'kategori_id' => 2, 'judul' => 'MySQL Database Administrator', 'pengarang' => 'Siti Aminah', 'stok' => 8],
            ['id' => 105, 'kategori_id' => 2, 'judul' => 'PostgreSQL Fundamental', 'pengarang' => 'Ahmad Fauzi', 'stok' => 4],
            ['id' => 106, 'kategori_id' => 3, 'judul' => 'Web Design Kreatif dengan Bootstrap', 'pengarang' => 'Dedi Santoso', 'stok' => 7],
            ['id' => 107, 'kategori_id' => 3, 'judul' => 'UI/UX Design Workflow', 'pengarang' => 'Dewi Lestari', 'stok' => 3],
            ['id' => 108, 'kategori_id' => 5, 'judul' => 'Pengantar Deep Learning', 'pengarang' => 'Prof. Suparman', 'stok' => 2],
        ];

        $buku_list = [];
        foreach ($buku_master as $buku) {
            if ($buku['kategori_id'] == $id) {
                $buku_list[] = $buku;
            }
        }
        
        return view('kategori.show', compact('kategori', 'buku_list'));
    }
    
    public function search($keyword)
    {
        $kategori_master = [
            ['id' => 1, 'nama' => 'Programming', 'deskripsi' => 'Buku pemrograman, software engineering, dan coding.', 'jumlah_buku' => 3],
            ['id' => 2, 'nama' => 'Database', 'deskripsi' => 'Buku perancangan, pengelolaan, dan optimasi basis data.', 'jumlah_buku' => 2],
            ['id' => 3, 'nama' => 'Web Design', 'deskripsi' => 'Buku desain antarmuka, UX/UI, HTML, CSS, dan framework frontend.', 'jumlah_buku' => 2],
            ['id' => 4, 'nama' => 'Jaringan Komputer', 'deskripsi' => 'Buku seputar infrastruktur jaringan, keamanan, dan server.', 'jumlah_buku' => 0],
            ['id' => 5, 'nama' => 'Kecerdasan Buatan', 'deskripsi' => 'Buku machine learning, data science, dan algoritma cerdas.', 'jumlah_buku' => 1],
        ];

        $kategori_list = [];
        foreach ($kategori_master as $kat) {
            if (stripos($kat['nama'], $keyword) !== false || stripos($kat['deskripsi'], $keyword) !== false) {
                $kategori_list[] = $kat;
            }
        }

        return view('kategori.search', compact('kategori_list', 'keyword'));
    }
}