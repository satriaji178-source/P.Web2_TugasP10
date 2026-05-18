<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Perpus Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="{{ url('/') }}">PerpusLaravel</a>
            <button class="navbar-expand-lg navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-brand nav-item">
                        <a class="nav-link {{ Request::is('perpustakaan') ? 'active' : '' }}" href="{{ url('/perpustakaan') }}">Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('anggota*') ? 'active' : '' }}" href="{{ url('/anggota') }}">Anggota</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('kategori*') ? 'active' : '' }}" href="{{ route('kategori.index') }}">Kategori Buku</a>
                    </li>
                </ul>
                <form class="d-flex" onsubmit="event.preventDefault(); let kw = document.getElementById('searchKey').value; if(kw) window.location.href='/kategori/search/'+kw;">
                    <input class="form-control me-2" type="search" id="searchKey" placeholder="Cari Kategori..." aria-label="Search" required>
                    <button class="btn btn-outline-primary" type="submit">Cari</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>