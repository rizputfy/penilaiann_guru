<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Sewa Buku</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            @if  (Auth::check() && Auth::user()) 
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('dashboard') }}">Penilaian</a>
            </li>
            @endif
            @if (Auth::check() && Auth::user()->level === 'Penilai')
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('guru.index') }}">Data Guru</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.index') }}">User</a>
            </li>
            @endif
            @if (Auth::check() && Auth::user()->level === 'Admin')
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('guru.index') }}">Data Guru</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.index') }}">User</a>
            </li>
            @endif
            @if (Auth::check() && Auth::user()->level === 'Yayasan')
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('guru.index') }}">Data Guru</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.index') }}">User</a>
            </li>
            @endif
            @if (Auth::check() && Auth::user()->level === 'Kepala Sekolah')
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('guru.index') }}">Guru</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.index') }}">User</a>
            </li>
            @endif
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm"> Logout</button>
                </form>
            </li>
        </ul>
        <div>
            @if(Auth::check())
            <b>{{ 'Hai, '.Auth::user()->name }}</b>
            @else
            @endif
        </div>
        <div>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
 </div>
</nav>