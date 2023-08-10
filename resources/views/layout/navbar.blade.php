<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if (Auth::check() && Auth::user())
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('dashboard') }}"><h5>Penilaian Guru</h5></a>
                </li>
                @endif
                @if (Auth::check() && Auth::user()->level === 'Penilai')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.index') }}">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('guru.index') }}">Data Guru</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('penilaian.home') }}">Penilaian</a>
                </li>
                @endif
                @if (Auth::check() && Auth::user()->level === 'Admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.index') }}">User</a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('guru.index') }}">Data Guru</a>
                </li>
                @endif
                @if (Auth::check() && Auth::user()->level === 'Yayasan')

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('guru.index') }}">Data Guru</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('jenis_aksi_nyata.index') }}">Jenis Aksi Nyata</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('penilaian.home') }}">Penilaian</a>
                </li>
                @endif
                @if (Auth::check() && Auth::user()->level === 'Keuangan')
                <li class="nav-item">
                    <a class="nav-link" href="#">Laporan Penilaian</a>
                </li>
                @endif
                @if (Auth::check() && Auth::user()->level === 'Kepala Sekolah')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.index') }}">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('guru.index') }}">Data Guru</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('periode.index') }}">Periode</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('unit.index') }}">Unit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('penilaian.home') }}">Penilaian</a>
                </li>
                @endif
                @if (Auth::check() && Auth::user()->level === 'Guru')
                <li class="nav-item">
                    <a class="nav-link" href="#">Raport</a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('penilaian_aksi_nyata.create') }}">Pengisian Aksi Nyata</a>
                </li>
                @endif
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-med"> Logout</button>
                    </form>
                </li>
            </ul>
            <div>
                @if(Auth::check())
                <b>{{ 'Hai, '.Auth::user()->name }}</b>
                @else
                @endif
            </div>
        </div>
    </div>
</nav>